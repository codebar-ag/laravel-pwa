<?php

namespace CodebarAg\LaravelPWA\Http\Controllers;

use CodebarAg\LaravelPWA\Actions\PwaManifest;
class PwaController
{
    /**
     * Return the PWA manifest as JSON.
     *
     * @throws \Exception
     */
    public function manifestJson()
    {
        return response()->json(PwaManifest::handle());
    }

    /**
     * Show the offline page.
     */
    public function offline()
    {
        return view('offline');
    }



    public function pwaJS()
    {
        $content = <<<JS
        const CACHE_NAME = 'offline-v1.1';
        const filesToCache = [
            '/',
            // '/offline',
            '/manifest.json',
            '/build/manifest.json'
        ];

        async function preLoad() {
            const cache = await caches.open(CACHE_NAME);
            const response = await fetch('/build/manifest.json');
            const json = await response.json();
            const urlsToCache = filesToCache.concat(Object.values(json).map(item => '/build/' + item['file']));
            await cache.addAll(urlsToCache);
        }

        self.addEventListener('install', event => {
            event.waitUntil(preLoad());
        });

        self.addEventListener('activate', event => {
            event.waitUntil(clients.claim());
            event.waitUntil(caches.keys().then(cacheNames => {
                return Promise.all(cacheNames.filter(cacheName => cacheName !== CACHE_NAME)
                    .map(cacheName => caches.delete(cacheName)));
            }));
        });

        self.addEventListener('fetch', event => {
            if (event.request.method === "GET" && (event.request.url.startsWith('http://') || event.request.url.startsWith('https://'))) {
                event.respondWith(fetch(event.request).then(response => {
                    return caches.open(CACHE_NAME).then(cache => {
                        cache.put(event.request, response.clone());
                        return response;
                    });
                }).catch(() => {
                    return caches.match(event.request)
                        .then(response => {
                            return response || (event.request.mode === 'navigate' ? caches.match('/offline') : undefined);
                        });
                }));
            } else {
                event.respondWith(caches.match(event.request).then(response => {
                    return response || fetch(event.request);
                }));
            }
        });
        JS;

        return response($content, 200)
            ->header('Content-Type', 'application/javascript');
    }
}

<?php

namespace CodebarAg\LaravelPWA;

use CodebarAg\LaravelPWA\Contracts\PWA;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PWAManifestService
{
    public static function get(?Model $tenant = null): array
    {
        if (filled($tenant) && $tenant instanceof PWA) {
            return Cache::rememberForever(
                key: 'pwa-manifest-tenant-'.$tenant->getKey(),
                callback: fn () => self::generate($tenant)
            );
        }

        $key = 'pwa-manifest';
        $ttl = config('pwa.cache.expiration');

        if ($tenant) {
            $key .= '-tenant-'.$tenant->getKey();
            $ttl = config('pwa.cache.tenant.expiration');
        }

        return Cache::remember(
            key: $key,
            ttl: $ttl,
            callback: fn () => self::generate($tenant)
        );
    }

    private static function generate(?Model $tenant = null): array
    {
        $pwa = $tenant?->pwa;

        $basicManifest = [
            'name' => $pwa?->name ?? config('pwa.manifest.name'),
            'short_name' => $pwa?->short_name ?? config('pwa.manifest.short_name'),
            'start_url' => $pwa?->start_url ?? asset(config('pwa.manifest.start_url')),
            'display' => $pwa?->display ?? config('pwa.manifest.display'),
            'theme_color' => $pwa?->theme_color ?? config('pwa.manifest.theme_color'),
            'background_color' => $pwa?->background_color ?? config('pwa.manifest.background_color'),
            'orientation' => $pwa?->orientation ?? config('pwa.manifest.orientation'),
            'status_bar' => $pwa?->status_bar ?? config('pwa.manifest.status_bar'),
            'splash' => $pwa?->splash ?? config('pwa.manifest.splash'),
            'version' => now()->format('YmdHis'),
        ];

        //        if (
        //            $pwa &&
        //            app('tenant')->getFirstMedia('icon')
        //        ) {
        //            $media = app('tenant')->getFirstMedia('icon');
        //            foreach ($media->generated_conversions as $conversion => $converted) {
        //                if ($converted) {
        //                    $basicManifest['icons'][] = [
        //                        'src' => $media->getUrl($conversion),
        //                        'type' => $media->mime_type,
        //                        'sizes' => $conversion,
        //                        'purpose' => 'any',
        //                    ];
        //                }
        //            }
        //        } else {
        //            foreach (config('pwa.manifest.icons') as $size => $file) {
        //                $fileInfo = pathinfo($file['path']);
        //                $basicManifest['icons'][] = [
        //                    'src' => $file['path'],
        //                    'type' => 'image/'.$fileInfo['extension'],
        //                    'sizes' => $size,
        //                    'purpose' => $file['purpose'],
        //                ];
        //            }
        //        }

        //        if (config('pwa.manifest.shortcuts')) {
        //            foreach (config('pwa.manifest.shortcuts') as $shortcut) {
        //
        //                if (array_key_exists('icons', $shortcut)) {
        //                    $fileInfo = pathinfo($shortcut['icons']['src']);
        //                    $icon = [
        //                        'src' => $shortcut['icons']['src'],
        //                        'type' => 'image/'.$fileInfo['extension'],
        //                        'purpose' => $shortcut['icons']['purpose'],
        //                    ];
        //                } else {
        //                    $icon = [];
        //                }
        //
        //                $basicManifest['shortcuts'][] = [
        //                    'name' => trans($shortcut['name']),
        //                    'description' => trans($shortcut['description']),
        //                    'url' => $shortcut['url'],
        //                    'icons' => [
        //                        $icon,
        //                    ],
        //                ];
        //            }
        //        }

        foreach (config('pwa.manifest.custom') as $tag => $value) {
            $basicManifest[$tag] = $value;
        }

        return $basicManifest;
    }
}

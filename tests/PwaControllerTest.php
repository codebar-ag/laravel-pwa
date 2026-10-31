<?php

it('serves the service worker as javascript', function () {
    $this->get(route('pwa.pwa-js'))
        ->assertOk()
        ->assertHeader('Content-Type', 'application/javascript');
});

it('only caches successful same-origin responses that may be stored', function () {
    $content = $this->get(route('pwa.pwa-js'))->getContent();

    expect($content)
        ->toContain("response.headers.get('Cache-Control')")
        ->toContain('!response.ok')
        ->toContain("response.type !== 'basic'")
        ->toContain('/no-store/i.test(cacheControl)');
});

it('serves the manifest as json', function () {
    config()->set('cache.default', 'array');
    config()->set('pwa.manifest.name', 'Laravel');
    config()->set('pwa.manifest.short_name', 'Laravel');

    $this->get(route('pwa.manifest'))
        ->assertOk()
        ->assertJsonPath('name', 'Laravel')
        ->assertJsonPath('short_name', 'Laravel');
});

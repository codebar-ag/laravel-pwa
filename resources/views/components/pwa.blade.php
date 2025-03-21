@use(Illuminate\Support\Arr)

    <!-- Web Application Manifest -->
<link
    rel="manifest"
    href="{{ route('pwa.manifest') }}"
/>

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('/pwa.js', {
                scope: '.',
            })
            .then(
                function (registration) {
                    // Registration was successful
                    console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope)
                },
                function (err) {
                    // registration failed :(
                    console.log('Laravel PWA: ServiceWorker registration failed: ', err)
                },
            )
    }
</script>

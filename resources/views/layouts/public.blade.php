<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Honda Paraguay'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @php
        $googleAdsId = $tracking['google_ads_id'] ?? 'AW-11117262860';
        $googleAnalyticsId = $tracking['google_analytics_id'] ?? 'G-91B1RWT8G0';
        $gtmId = $tracking['gtm_id'] ?? 'GTM-PZCC46V8';
        $metaPixelId = $tracking['meta_pixel_id'] ?? '173327190136806';
        $twitterPixelId = $tracking['twitter_pixel_id'] ?? 'p4avp';

        // Landing page tracking overrides
        if (isset($isLanding) && $isLanding && isset($landingPage)) {
            if ($landingPage->google_ads_id) {
                $googleAdsId = $landingPage->google_ads_id;
            }
            if ($landingPage->meta_pixel_id) {
                $metaPixelId = $landingPage->meta_pixel_id;
            }
        }
    @endphp

    @if($googleAdsId)
    <!-- Google Tag Manager remarketing -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAdsId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $googleAdsId }}');
    </script>
    @endif

    @if($googleAnalyticsId)
    <!-- Google tag analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalyticsId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $googleAnalyticsId }}');
    </script>
    @endif

    @if($gtmId)
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;
            j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $gtmId }}');
    </script>
    @endif

    @if($metaPixelId)
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $metaPixelId }}');
        fbq('track', 'PageView');
    </script>
    @endif

    @if($twitterPixelId)
    <!-- Twitter conversion tracking base code -->
    <script>
        !function(e,t,n,s,u,a){
            e.twq||(s=e.twq=function(){
                s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
            },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
                a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
            twq('config','{{ $twitterPixelId }}');
    </script>
    @endif

    @if(!empty($tracking['custom_head_scripts']))
    {!! $tracking['custom_head_scripts'] !!}
    @endif

    @if(isset($isLanding) && $isLanding && isset($landingPage))
        @if($landingPage->google_ads_conversion_label)
        <script>
            window._landingConversionLabel = '{{ $landingPage->google_ads_conversion_label }}';
            window._landingGoogleAdsId = '{{ $landingPage->google_ads_id ?? $googleAdsId }}';
        </script>
        @endif
        @if($landingPage->custom_head_scripts)
        {!! $landingPage->custom_head_scripts !!}
        @endif
    @endif

    @stack('styles')
</head>
<body class="font-sans antialiased">
    @if($gtmId ?? false)<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>@endif
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('modals')

    <script src="{{ asset('assets/js/script.js') }}?v={{ filemtime(public_path('assets/js/script.js')) }}"></script>
    @stack('scripts')
</body>
</html>

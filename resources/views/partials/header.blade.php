<head>
    <title>@yield('metaTitle')</title>
    <meta name="description" content="@yield('metaDescription')">
    <meta name="keywords" content="@yield('metaKeywords')">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @desktop
        <?=View::make('partials.jsCssIncludes');?>
    @enddesktop
</head>
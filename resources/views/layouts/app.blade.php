<!DOCTYPE html>
<html  lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title>File Uploader</title>
    <script src="{{ asset('helper/startswith.js') }}" type="text/javascript"></script>
    <!--  CDTS implementation -->
    <script type="text/javascript" src="https://www.canada.ca/etc/designs/canada/cdts/gcweb/v4_0_30/cdts/compiled/soyutils.js"></script>
    <script type="text/javascript" src="https://www.canada.ca/etc/designs/canada/cdts/gcweb/v4_0_30/cdts/compiled/wet-en.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
      document.write(wet.builder.refTop({
        cdnEnv: 'prod',
        subTheme: 'gcweb',
        jqueryEnv: 'external',
        localPath: '',
        isApplication: true
      }));
    </script>

    <script type="text/javascript" src="{{ asset('helper/wet.js') }}"></script>
  </head>
  <body>
    <div id="def-top"></div>
    <noscript>
      <strong>We're sorry but File Uploader doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <main id="wb-cont" role="main" property="mainContentOfPage" class="container">
      
        <div id="app">
          @yield('content')
        </div>
      <div id="def-preFooter"></div>
    </main>
    <div id="def-footer"></div>
  </body>
</html>

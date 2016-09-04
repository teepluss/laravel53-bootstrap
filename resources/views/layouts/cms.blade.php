<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/cms.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Header -->
      @include('layouts.cms.header')

      <!-- Left side column. contains the logo and sidebar -->
      @include('layouts.cms.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <!-- Footer -->
      @include('layouts.cms.footer')
    </div> <!-- ./wraper -->
    <script src="{{ elixir('js/admin.js') }}"></script>
    <script src="{{ elixir('js/cms.js') }}"></script>
</body>
</html>

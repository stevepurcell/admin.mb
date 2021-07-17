<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mother Bucket Song Manager</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  
    @include('partials.topnav')
    @include('partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="c-body">
        <main class="c-main">
            @yield('content')
        </main>
    </div>
    
  </div>
  <!-- /.content-wrapper -->


      @include('partials.footer')
      @livewireScripts
      <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   {{--nav bar--}}
   @include('layouts.admin-layouts.navbar')

    <!-- Main Sidebar Container -->
    @include('layouts.admin-layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
       @if(session('success'))
           <div class="row d-flex justify-content-center">
               <div class="text-center">
                   <div class="alert alert-success alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <strong>Success!</strong> {{session('success')}}.
                   </div>
               </div>
           </div>
       @endif

       @if(session('error'))
           <div class="row d-flex justify-content-center">
               <div class="text-center">
                   <div class="alert alert-danger alert-dismissible fade show">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <strong>Oopps!</strong> {{session('error')}}.
                   </div>
               </div>
           </div>
   @endif
            @yield('content')
    <!-- /.content-wrapper -->

{{--       footer--}}
       @include('layouts.admin-layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('js')
</body>
</html>

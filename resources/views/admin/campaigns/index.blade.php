@extends('layouts.admin-layouts.wrapper')

@section('title','Campaigns')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Campaigns</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Campaign Owner</th>
                            <th>Category</th>
                            <th>Campaign Progress</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($campaigns as $campaign)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{Str::of($campaign->title)->substr(0,30)}}</td>
                                <td>{{$campaign->ownername}}</td>
                                <td>{{$campaign->catname}}</td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$campaign->percentage}}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{$campaign->percentage ? $campaign->percentage : '0'}}% Complete
                                    </small>
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-primary btn-sm btn-flat mx-1" href="{{route('camp.show',$campaign->id)}}">View <i class="fas fa-folder"></i></a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('js')
    <!-- jQuery -->
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin-assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/')}}dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
@endsection

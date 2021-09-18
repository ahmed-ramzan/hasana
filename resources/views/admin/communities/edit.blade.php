@extends('layouts.admin-layouts.wrapper')

@section('title','Edit Community')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
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
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Community</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-md-6 text-center">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit Community</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('communities.update',$community->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <input type="hidden" name="role_id" value="2">
                                <div class="form-group">
                                    <label for="name">Community Name</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{$community->name}}"
                                           placeholder="Enter Community Name" disabled>
                                    <p class="text-danger">@error('name'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Community Email</label>
                                    <input type="text" class="form-control"
                                           name="email"
                                           value="{{$community->email}}"
                                           placeholder="Enter Community Name">
                                    <p class="text-danger">@error('email'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Community Password</label>
                                    <input type="password" class="form-control"
                                           name="password"
                                           placeholder="Enter Community Password">
                                    <p class="text-danger">@error('password'){{$message}}@enderror</p>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('js')
    <!-- jQuery -->
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin-assets/dist/js/pages/dashboard.js')}}"></script>
@endsection

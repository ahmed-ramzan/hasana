@extends('layouts.admin-layouts.wrapper')

@section('title','message')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.css')}}">

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
                            <li class="breadcrumb-item active">Message to admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-md-9">
                    <form method="post" action="{{route('message.store')}}">
                        @csrf
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose New Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <input name="subject" class="form-control" placeholder="Subject:" value="{{old('subject')}}" required>
                                <p class="text-danger">@error('subject'){{$message}}@enderror</p>
                            </div>
                            <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success"><i class="far fa-envelope"></i> Send</button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    </form>
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
    <
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            //Add text editor
            $('#compose-textarea').summernote()
        })
    </script>



@endsection

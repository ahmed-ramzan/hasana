@extends('layouts.admin-layouts.wrapper')

@section('title','Campaign')

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
                            <li class="breadcrumb-item active">Showing Campaign</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Showing Campaign</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Campaign title</label>
                                <input type="text" class="form-control"
                                       name="title"
                                       value="{{$camp->title}}"
                                       disabled>
                            </div>


                            <div class="form-group">
                                <label for="image">Campaign Image</label>
                                <p><img class="w-50" src="/storage/{{$camp->image}}" alt="image"></p>
                            </div>


                            <div class="form-group">
                                <label for="password_confirmation">Details of Campaign</label>
                                <textarea id="summernote" name="description">
                                        {{$camp->description}}
                                    </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{route('camp.index')}}" class="btn btn-success">Back To Campaigns</a>
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
    <!-- Select2 -->
    <script src="{{asset('admin-assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin-assets/dist/js/pages/dashboard.js')}}"></script>

    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endsection

@extends('layouts.admin-layouts.wrapper')

@section('title','Edit Profile')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
                            <li class="breadcrumb-item active">Update Profile</li>
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
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('community-profile.update',$community->id)}}">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="role_id" value="2">
                                <div class="form-group">
                                    <label for="name">Community Name</label>
                                    <input type="text" class="form-control"
                                           name="name"
                                           value="{{$community->name}}"
                                           placeholder="Enter Community Name" required>
                                    <p class="text-danger">@error('name'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Community Phone</label>
                                    <input type="text" class="form-control"
                                           name="phone"
                                           value="{{$community->phone}}"
                                           data-inputmask='"mask": "9999999999"' data-mask
                                           placeholder="Enter Community Phone Number" required>
                                    <p class="text-danger">@error('phone'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="city">Select Community City</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="city">
                                        <option value="{{$community->city}}">{{$community->city}}</option>
                                        <option value="Al-Abwa">Al-Abwa</option>
                                        <option value="Al Artaweeiyah">Al Artaweeiyah</option>
                                        <option value="Ahmadpur East">Ahmadpur East</option>
                                        <option value="Badr">Badr</option>
                                        <option value="Bisha">Bisha</option>
                                        <option value="Bareg">Bareg</option>
                                        <option value="Buraydah">Buraydah</option>
                                        <option value="Bhera">Bhera</option>
                                        <option value="Al Bahah">Al Bahah</option>
                                        <option value="Buq a">Buq a</option>
                                        <option value="Dammam">Dammam</option>
                                        <option value="Dhahran">Dhahran</option>
                                        <option value="Dhurma">Dhurma</option>
                                        <option value="Dahaban">Dahaban</option>
                                        <option value="Diriyah">Diriyah</option>
                                        <option value="Duba">Duba</option>
                                        <option value="Dumat Al-Jandal">Dumat Al-Jandal</option>
                                        <option value="Dawadmi">Dawadmi</option>
                                    </select>
                                    <p class="text-danger">@error('city'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="district">Select Community District</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="district">
                                        <option value="{{$community->district}}">{{$community->district}}</option>
                                        <option value="Al-Abwa">Al-Abwa</option>
                                        <option value="Al Artaweeiyah">Al Artaweeiyah</option>
                                        <option value="Ahmadpur East">Ahmadpur East</option>
                                        <option value="Badr">Badr</option>
                                        <option value="Bisha">Bisha</option>
                                        <option value="Bareg">Bareg</option>
                                        <option value="Buraydah">Buraydah</option>
                                        <option value="Bhera">Bhera</option>
                                        <option value="Al Bahah">Al Bahah</option>
                                        <option value="Buq a">Buq a</option>
                                        <option value="Dammam">Dammam</option>
                                        <option value="Dhahran">Dhahran</option>
                                        <option value="Dhurma">Dhurma</option>
                                        <option value="Dahaban">Dahaban</option>
                                        <option value="Diriyah">Diriyah</option>
                                        <option value="Duba">Duba</option>
                                        <option value="Dumat Al-Jandal">Dumat Al-Jandal</option>
                                        <option value="Dawadmi">Dawadmi</option>
                                    </select>
                                    <p class="text-danger">@error('district'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="phone">CNIC</label>
                                    <input type="text" class="form-control"
                                           name="cnic"
                                           value="{{$community->cnic}}"
                                           data-inputmask='"mask": "99999-9999999-9"' data-mask
                                           placeholder="Enter CNIC" required>
                                    <p class="text-danger">@error('cnic'){{$message}}@enderror</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update Profile</button>
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
    <!-- InputMask -->
    <script src="{{asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin-assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('[data-mask]').inputmask()
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>
@endsection

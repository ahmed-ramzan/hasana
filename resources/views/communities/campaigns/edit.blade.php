@extends('layouts.admin-layouts.wrapper')

@section('title','Edit Campaign')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
                            <li class="breadcrumb-item active">Edit Campaign</li>
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
                            <h3 class="card-title">Edit Campaign</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('campaigns.update',$campaign->id)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Campaign title</label>
                                    <input type="text" class="form-control"
                                           name="title"
                                           value="{{$campaign->title}}"
                                           placeholder="Enter Campaign Title" required>
                                    <p class="text-danger">@error('title'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="category" required>
                                        <option value="">Select Category</option>
                                        @forelse($categories as $category)
                                            <option value="{{$category->id}}"
                                                @if($category->id == $campaign->category_id)
                                                selected
                                                @endif
                                            >{{$category->name}}</option>
                                        @empty
                                            <option value="">No Category Yet!</option>
                                        @endforelse
                                    </select>
                                    <p class="text-danger">@error('category'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="goal">Fund Goal</label>
                                    <input type="text" class="form-control"
                                           name="goal"
                                           value="{{$campaign->goal}}"
                                           placeholder="Enter amount need for this campaign" required>
                                    <p class="text-danger">@error('goal'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="goal">Per person fund</label>
                                    <input type="text" class="form-control"
                                           name="per_person_fund"
                                           value="{{$campaign->per_person_fund}}"
                                           placeholder="Enter per person fund for this campaign" required>
                                    <p class="text-danger">@error('per_person_fund'){{$message}}@enderror</p>
                                </div>

                                <div class="form-group">
                                    <label for="image">Campaign Image</label>
                                    <input type="file" class="form-control"
                                           name="image"
                                           >
                                    <p class="text-danger">@error('image'){{$message}}@enderror</p>
                                    <p><img class="w-25" src="/storage/{{$campaign->image}}" alt=""></p>
                                </div>

                               {{-- <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control"
                                           name="location"
                                           value="{{$campaign->location}}"
                                           required>
                                    <p class="text-danger">@error('location'){{$message}}@enderror</p>
                                </div>--}}

                                <div class="form-group">
                                    <label for="city">Select Community City</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="city">
                                        <option value="{{$campaign->city}}">{{$campaign->city}}</option>
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
                                    <label for="city">Select Community District</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="district">
                                        <option value="{{$campaign->district}}">{{$campaign->district}}</option>
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
                                    <label for="password_confirmation">Details of Campaign</label>
                                    <textarea id="summernote" name="description">
                                        {{$campaign->description}}
                                    </textarea>
                                    <p class="text-danger">@error('description'){{$message}}@enderror</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update Campaign</button>
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
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endsection

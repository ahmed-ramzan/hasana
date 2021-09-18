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
                        <a href="{{route('campaigns.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Add Campaign</a>
                    </div><!-- /.col -->
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
{{--                            <th>Category</th>--}}
                            <th>Goal</th>
                            <th>Category</th>
{{--                            <th>Location</th>--}}
{{--                            <th>Image</th>--}}
                            <th>Date</th>
                            <th>Campaign Progress</th>
                            <th>Share</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($campaigns as $campaign)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{Str::of($campaign->title)->substr(0,30)}}</td>
                                <td>{{$campaign->goal}}</td>
                                <td>{{$campaign->category_name}}</td>
{{--                                <td>{{$campaign->location}}</td>--}}
{{--                                <td><img style="width: 45px" src="/storage/{{$campaign->image}}" alt="{{$campaign->title}}"></td>--}}
                                <td>{{$campaign->created_at}}</td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$campaign->percentage}}%">
                                        </div>
                                    </div>
                                    <small>
                                        {{$campaign->percentage ? $campaign->percentage : '0'}}% Complete
                                    </small>
                                </td>
                                <td><div class="addthis_inline_share_toolbox" data-title="{{$campaign->title}}" data-url="{{route('single-cause',$campaign->id)}}"></div></td>
                                <td class="d-flex">
                                    <a class="btn btn-primary btn-sm btn-flat mx-1 rounded-circle" href="{{route('campaigns.show',$campaign->id)}}"> <i class="fas fa-eye"></i></a>
                                    <a class="btn btn-info btn-flat btn-sm mx-1 rounded-circle" href="{{route('campaigns.edit',$campaign->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{route('campaigns.destroy',$campaign->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger btn-flat btn-sm mx-1 rounded-circle"> <i class="fas fa-trash"></i></button>
                                        <button type="button" data-toggle="modal" data-id="{{$campaign->id}}" data-target="#modal-lg" class="btn btn-info btn-flat btn-sm mx-1 rounded-circle"> <i class="fas fa-bell"></i></button>
                                    </form>

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
{{--modal start--}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Notifications</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="result"></div>
                    <h3 id="loadingData" style="display: none" class="text-center">Loading...</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
        /*modal computation*/
        $('#modal-lg').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            var campaignId = $(e.relatedTarget).data('id');
            // $("#camp").text( campaignId );
            $.ajax({
                type: 'get',
                cache: false,
                url: 'campaigns/notifications/'+campaignId,
                beforeSend: function() {
                    $("#loadingData").show();
                },
                // data: {id:campaignId},
                success: function (response) {
                    /*hide loader*/
                    $("#loadingData").hide();

                    var data = JSON.parse(response);
                    for(var i=0; i<=data.length; i++)
                    {
                        var date = data[i].created_at;
                        var fullDate = date.slice(0,10);
                        var fullTime = date.slice(11,19);
                        $('#result').append('<div class="direct-chat-msg right">\n' +
                            '                        <div class="direct-chat-infos clearfix">\n' +
                            '                            <span class="direct-chat-timestamp float-left">'+fullDate+' &nbsp '+fullTime+'</span>\n' +
                            '                        </div>\n' +
                            '                        <div class="direct-chat-text">\n' +
                            '                            '+(i+1)+'. <b>'+data[i].users.name+'</b> has donated <b>'+data[i].amount+'</b> Rs!\n' +
                            '                        </div>\n' +
                            '                    </div>');
                    }
                }
            })
        });
        /*when close the modal then clear the result div*/
        $('#modal-lg').on('hidden.bs.modal', function () {
            $('#result').empty();
        })
    </script>
    {{--share buttons--}}
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6023b3bbc014c1cd"></script>
@endsection

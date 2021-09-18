@extends('layouts.admin-layouts.wrapper')

@section('title','messages')

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
                            <li class="breadcrumb-item active">Messages</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Date-Time</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @forelse($messages as $message)
                                        <td class="mailbox-name"><a href="#">{{$message->user->name}}</a></td>
                                        <td class="mailbox-subject"><b>{{$message->subject}}</b>
                                        </td>
                                        <td class="mailbox-date">{{\Carbon\Carbon::parse($message->created_at)->format('j F Y H:i:s')}}</td>
                                            <td><button type="button" data-toggle="modal" data-id="{{$message->id}}" data-target="#message-lg" class="btn btn-info btn-flat btn-sm mx-1">View Message <i class="fas fa-comments"></i></button></td>
                                    </tr>
                                    @empty
                                        <h4>No messages yet!</h4>
                                    @endforelse
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    {{--modal start--}}
    <div class="modal fade" id="message-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
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

    <script>
        /*modal computation*/
        $('#message-lg').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            var messageId = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'get',
                cache: false,
                url: 'messages/show/'+messageId,
                beforeSend: function() {
                    $("#loadingData").show();
                },
                success: function (response) {
                    /*hide loader*/
                    $("#loadingData").hide();
                    // alert(response)
                    var data = JSON.parse(response);
                    for(var i=0; i<=data.length; i++)
                    {
                        var res = $.parseHTML(data[i].message)
                        $('#result').append(res);
                    }
                }
            })
        });
        /*when close the modal then clear the result div*/
        $('#message-lg').on('hidden.bs.modal', function () {
            $('#result').empty();
        })
    </script>


@endsection

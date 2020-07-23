@extends('dashboard.layouts.admin')

@section('headIncludes')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">
                        Notifications
                        <a href="{{route('notifications.create')}}" class="btn btn-outline-primary btn-flat btn-sm ml-3"><i
                                    class="fa fa-plus"></i> Add new notification</a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@if($notifications->count())
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    @include('dashboard.includes.flash_messages')

                    <table class="table table-hover table-responsive" id="dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Number of emails</th>
                            <th>Status</th>
                            <th>Date</th>


                        </tr>
                        </thead>
                        <tbody>

                        @foreach($notifications as $notification)
                            <tr>
                                <td>
                                    <a href="{{route('notifications.edit', $notification->id)}}">{{$notification->subject}}</a>
                                </td>
                                {{-- <td align="right" style="position: relative" class="p-3">
                                    @include('dashboard.includes.delete-button',['id' => $notification->id, 'route' => route('notifications.destroy', $notification->id)])
                                </td> --}}

<td>{{$notification->number_of_emails}}
</td>

    @if($notification->status)
        <td> Sent </td>
    @else
        <td> Not sent </td>
    @endif


                                <td>
                                    <a href="#">{{$notification->created_at}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->


        </div>
    </div>
@endif

    @include('dashboard.includes.modal-confirm-delete')
@endsection

@section('footerIncludes')
    <!-- DataTables -->

    <script>
        $(function () {
            $('#dataTable').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "autoWidth": false,
                "order": [[ 3, "desc" ]],
        "aoColumns": [
           null,
           { "bSortable": false },
           { "bSortable": false },
           null
         ]

            });
        });
    </script>
@endsection

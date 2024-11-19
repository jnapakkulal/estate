@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"> All Contacts</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Subject</th>
                                    <th> Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->message}}</td>


                                        <td>
                                            <!--  <a href="{{route('edit.roles', $item->id) }}"class="btn btn-inverse-warning">Edit</a>-->
                                            <a href="{{route('delete.contacts', $item->id)}}" id="delete"
                                                class="btn btn-inverse-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
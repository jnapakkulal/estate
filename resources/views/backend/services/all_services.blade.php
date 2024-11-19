@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.services')}}" class="btn btn-inverse-info">Add Services</a>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All services</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SI No</th>
                                    <th>Service Icon</th>
                                    <th>Service Title</th>
                                    <th>Service Description</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{$item->photo}}</td> <!-- photo name is in database name -->
                                        <!-- <td><img src="{{ $item->photo }}" style="width:70px; height:40px;">
                                                    </td>-->
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->description}}</td>

                                        <td>
                                            <!--<a href="{{route('edit.amenities', $item->id)}}"
                                                                            class="btn btn-inverse-warning">Edit</a>-->
                                            <a href="{{route('delete.services', $item->id)}}" id="delete"
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
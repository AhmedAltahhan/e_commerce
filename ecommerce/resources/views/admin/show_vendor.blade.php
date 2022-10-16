@extends('admin/navbar')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Vendor</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($vendors as $vendor)
                <tbody>
                    <tr>
                        <form action="updatedelete_vendor" method="GET">
                        <td><input type="hidden" name="id" value="{{$vendor -> id}}">{{$vendor -> id}}</td>
                        <td><input type="hidden" name="name" value="{{$vendor -> name}}">{{$vendor -> name}}</td>
                        <td><input type="hidden" name="email" value="{{$vendor -> email}}">{{$vendor -> email}}</td>
                        <td><input type="hidden" name="Address" value="{{$vendor -> Address}}">{{($vendor -> Address)}}</td>
                        <td><input type="submit" class=" btn btn-outline-primary rounded-pill" name="update" value="Update"></td>
                        <td><input type="submit" class=" btn btn-outline-primary rounded-pill" value="Delete"></td>
                        </form>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection



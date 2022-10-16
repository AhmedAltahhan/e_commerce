@extends('admin/navbar')

@section('content')

<div class="col-md-4 m-auto border-info">
    <h2 class="text-center text-danger">Update</h2>
    <form action="update_vendor" method="get">
        <div class="mb-2">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$name}}" class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">email</label>
            <input type="email" name="email" value="{{$email}}" class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">Address</label>
            <input type="text" name="Address" value="{{$Address}}" class="form-control">
        </div><br>
        <input type="hidden" name="id" value="{{$id}}" class="form-control">
        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>
</div>


@endsection

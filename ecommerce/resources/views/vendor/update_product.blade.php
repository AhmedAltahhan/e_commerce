@extends('vendor/navbar')

@section('content')

<div class="col-md-4 m-auto border-info">
    <h2 class="text-center text-danger">Update</h2>
    <form action="update_product" method="get">
        <div class="mb-2">
            <label for="">Product Name</label>
            <input type="text" name="name" value="{{$name}}"  class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">Product Name</label>
            <input type="number" name="price" value="{{$price}}"  class="form-control">
        </div><br>
        <input type="hidden" name="id" value="{{$product_id}}" id="">
        <button type="submit" class="btn btn-outline-danger">Update</button>
    </form>
</div>


@endsection

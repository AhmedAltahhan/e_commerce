@extends('vendor/navbar')

@section('content')

<div class="col-md-4 m-auto border-info">
    <h2 class="text-center text-danger">Add Product</h2>
    <form action="add_products" method="post">
        @csrf
        <div class="mb-2">
            <label for="">Product Name</label>
            <input type="text" name="name" class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">description</label>
            <input type="text" name="description" class="form-control">
        </div><br>
        <div class="mb-2">
            <label for="">Product Name</label>
            <input type="file" name="image" class="form-control">
        </div><br>

        <button type="submit" class="btn btn-outline-danger">Update</button>
    </form>
</div>


@endsection

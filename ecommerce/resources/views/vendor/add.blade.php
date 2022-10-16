@extends('vendor/navbar')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Add Products</h6>
    </div>
    <div class="card-body">

<center>
    <a class="btn btn-outline-danger fw-blod fs-4 rounded-pill" href="show_orders">show orders</a>
    <a  class="btn btn-outline-danger fw-blod fs-4 rounded-pill" href="add_product">Add product</a>


    </center>

    <div class="table-responsive mt-5">
        <table class="table table-bordered text-danger" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($data as $d)
            <tbody>
                <tr>
                    <form action="updatedelete" method="GET">
                    <td class="pt-5"><input type="hidden" name="id" value="{{$d -> product_id}}">{{$d -> product_id}}</td>
                    <td class="pt-5"><input type="hidden" name="name" value="{{$d -> name}}">{{$d -> name}}</td>
                    <td class="pt-5"><input type="hidden" name="price" value="{{$d -> price}}">{{$d -> price}}</td>
                    <td class="pt-5"><input type="hidden" name="description" value="{{$d -> description}}">{{($d -> description)}}</td>
                    <td><img src="images/{{$d -> image}}" width="90px" height="90px"></td>
                    <td><input type="submit" class=" btn btn-outline-danger rounded-pill" name="update" value="Update"></td>
                    <td><input type="submit" class=" btn btn-outline-danger rounded-pill" value="Delete"></td>
                </form>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    </div>
</div>


@endsection



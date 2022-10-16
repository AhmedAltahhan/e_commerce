@extends('admin/navbar')


@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add Vendor</h6>
            </div>

            <div class="card-body">
                <div class="chart-area">
                    @if (isset($error))
                        <small style="color:red">{{$error}}</small>
                    @endif

                    @if (isset($success))
                        <small style="color:green">{{$success}}</small>
                    @endif

                    <div>
                        <form action="/add_vendor" method="POST">
                            @csrf
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter the name"><br>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter the email"><br>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter the password"><br>
                            <input type="text" name="Address" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Address"><br>
                            <button type="submit" class="btn btn-primary">send</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

@endsection

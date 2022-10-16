@extends('vendor/navbar')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Orders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-danger" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>price</th>
                        <th>numper of pieces</th>
                    </tr>
                </thead>
                @foreach ($data as $datas)
                <tbody>
                    <tr>

                        <td>{{$datas -> name}}</td>
                        <td>{{$datas -> total}}</td>
                        <td>{{($datas -> description)}}</td>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

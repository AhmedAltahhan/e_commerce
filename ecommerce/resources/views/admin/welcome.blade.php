@extends('admin/navbar')

@section('content')

                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                            </thead>
                                            @foreach ($admins as $admin)
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$admin -> name}}</td>
                                                <td>{{$admin -> email}}</td>
                                            </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

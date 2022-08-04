@extends('layouts.app')
@section('content')

<div class="container-fluid">

    <h2>Total Profiled Client</h2>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Legal Counsel</th>
                        <th>Profile Completed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Legal Counsel</th>
                        <th>Profile Completed</th>
                        <th>Action</th>
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach ($data as $clientdata )
                        <tr>
                            <td>{{$clientdata->first_name}}</td>
                            <td>{{$clientdata->last_name}}</td>
                            <td>{{$clientdata->email}}</td>
                            <td>{{\Carbon\Carbon::parse($clientdata->date_of_birth)->format('j, F, Y')}}</td>
                            <td>{{$clientdata->primary_legal_counsel}}</td>
                            <td>
                                @if ($clientdata->image == null)
                                <h5>false</h5>
                                @else <h5>true</h5>
                                @endif
                            </td>
                            <td>
                                <a href='{{url("viewprofile/$clientdata->id")}}' onclick="confirm('Do you want to view this clients profile')" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-10">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <span class="text">View</span>
                                </a>
                            </td>

                        </tr>


                    @endforeach
                </tbody>
</div>
    </div>


</div>

@endsection

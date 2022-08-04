@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
    <div class="card md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
        </div>
          @if(session()->has('status'))
                                <div class="alert alert-info text-center">
                          <span>
                                 {{session('status')}}
                                 </span>
                                </div>
@endif
        <div class="card-body">
           <form action="{{route('update.client')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-user" name="first_name" value="{{$data->first_name}}"
                        placeholder="First Name">
                        <span class="text-danger">@error('first_name'){{$message}}

                            @enderror</span>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control form-control-user" name="last_name" value="{{$data->last_name}}"
                        placeholder="Last Name">
                        <span class="text-danger">@error('last_name'){{$message}}

                            @enderror</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" class="form-control form-control-user" name="email" value="{{$data->email}}"
                    placeholder="Email">
                    <span class="text-danger">@error('email'){{$message}}

                        @enderror</span>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">DOB</div>
                        </div>
                    <input type="date" class="form-control form-control-user" name="date_of_birth" value="{{$data->date_of_birth}}"
                        placeholder="Date of Birth">
                        <span class="text-danger">@error('date_of_birth'){{$message}}

                            @enderror</span>
                </div>

            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-user" name="primary_legal_counsel" value="{{$data->primary_legal_counsel}}"
                    placeholder="Primary Legal Counsel">
                    <span class="text-danger">@error('primary_legal_counsel'){{$message}}

                        @enderror</span>
            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Profile Image</div>
                        </div>
                    <input type="file" class="form-control form-control-user" name="image" value="{{$data->image}}"
                    placeholder="image">
                    <span class="text-danger">@error('image'){{$message}}

                        @enderror</span>
                </div>

            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea type="text-area" class="form-control form-control-user"
                    placeholder="Case Details" rows="7" cols="10" name="case_details" value="{{$data->case_details}}">{{$data->case_details}}</textarea>
                    <span class="text-danger">@error('case_details'){{$message}}

                        @enderror</span>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <button class="btn btn-success btn-icon-split" type="submit" ><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Update Client</span></button>
                </div>
            </div>
            {{-- @endforeach --}}
           </form>
        </div>
    </div>

</div>
<div class="col-md-6">
    <div class="card md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Client Profile</h6>
        </div>
        <div class="card-body">
            <div class="col-md-offset-3 col-md-6">
            @if ($data->image != null)
            <img src="{{$data->image}}" height="100px" width="100px" class="rounded-circle mx-auto">
            @else
            <img src="https://www.pngmart.com/files/22/User-Avatar-Profile-PNG-Isolated-Transparent-Picture.png" height="100px" width="100px" class="rounded-circle mx-auto">
            @endif
        </div>
        <ul class="list-group mt-4">
            <li class="list-group-item"><b>Name:</b> {{$data->first_name}} {{$data->last_name}}</li>
            <li class="list-group-item"><b>Email:</b> {{$data->email}}</li>
            <li class="list-group-item"><b>Date of Birth:</b> {{\Carbon\Carbon::parse($data->date_of_birth)->format('j, F, Y')}}</li>
            <li class="list-group-item"><b>Date Profiled:</b> {{\Carbon\Carbon::parse($data->created_at)->format('j, F, Y')}}</li>
            <li class="list-group-item"><b>Legal Counsel:</b> {{$data->primary_legal_counsel}}</li>
            <li class="list-group-item"><b>Case Details:</b> {{$data->case_details}}</li>



          </ul>
        </div>
</div>
</div>
</div>

@endsection

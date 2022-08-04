@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-md-8">
    <div class="card md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Client</h6>
        </div>
          @if(session()->has('status'))
                                <div class="alert alert-info text-center">
                          <span>
                                 {{session('status')}}
                                 </span>
                                </div>
@endif
        <div class="card-body">
           <form action="{{route('new.client')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-user" name="first_name" value="{{old('first_name')}}"
                        placeholder="First Name">
                        <span class="text-danger">@error('first_name'){{$message}}

                            @enderror</span>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control form-control-user" name="last_name" value="{{old('last_name')}}"
                        placeholder="Last Name">
                        <span class="text-danger">@error('last_name'){{$message}}

                            @enderror</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="text" class="form-control form-control-user" name="email" value="{{old('email_name')}}"
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
                    <input type="date" class="form-control form-control-user" name="date_of_birth" value="{{old('date_of_birth')}}"
                        placeholder="Date of Birth">
                        <span class="text-danger">@error('date_of_birth'){{$message}}

                            @enderror</span>
                </div>

            </div>
            <div class="col-md-6">
                <input type="text" class="form-control form-control-user" name="primary_legal_counsel" value="{{old('primary_legal_counsel')}}"
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
                    <input type="file" class="form-control form-control-user" name="image"
                    placeholder="image">
                    <span class="text-danger">@error('image'){{$message}}

                        @enderror</span>
                </div>

            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea type="text-area" class="form-control form-control-user"
                    placeholder="Case Details" rows="7" cols="10" name="case_details" value="{{old('case_details')}}"></textarea>
                    <span class="text-danger">@error('case_details'){{$message}}

                        @enderror</span>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <button class="btn btn-success btn-icon-split" type="submit" ><span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Profile Client</span></button>
                </div>
            </div>
           </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection

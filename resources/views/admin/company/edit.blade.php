@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-2">
        @if(session()->has('success'))
        <div class="col-md-12 p-3">
            <p class="badge bg-success"> {{session()->get('success')}}</p>
         </div>
        @endif
    </div>
    <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <input type="hidden" value="{{ old('id',$company->id) }}" name="id">
    <div class="row gy-4">
                <div class="form-group col-6">
                    <label for="name" class="form label">Company Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old("name",$company->name) }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>
                <div class="form-group col-6">
                    <label for="file" class="form label">Company Logotype</label>
                    <input id="file" type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>
                <div class="form-group col-6">
                    <label for="email" class="form label">Company Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old("email",$company->email) }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>
                <div class="form-group col-6">
                    <label for="website" class="form label">Company Website</label>
                    <input id="emwebsiteail" type="url" name="website" class="form-control" value="{{ old("website",$company->website) }}" required>
                    @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success col-sm-2">Save</button>
                </div>
        </form>         
      
     </div>
</div>
 
@endsection

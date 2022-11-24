@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
    <div class="row gy-4">
                <div class="form-group col-6">
                    <label for="name" class="form label">Company Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old("name") }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @endif   
                </div>
                <div class="form-group col-6">
                    <label for="file" class="form label">Company Logo</label>
                    <input id="file" type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="email" class="form label">Company Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old("email") }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @endif   
                </div>
                <div class="form-group col-6">
                    <label for="website" class="form label">Company Website</label>
                    <input id="website" type="url" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old("website") }}" required>
                    @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @endif   
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success col-sm-2">Create</button>
                </div>
        </form>         
      
     </div>
</div>
 
@endsection

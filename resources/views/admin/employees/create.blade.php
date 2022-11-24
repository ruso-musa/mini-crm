@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('admin.employees.store') }}" method="post">
        @csrf
        @method("POST")
    <div class="row gy-4">
                <div class="form-group col-6">
                    <label for="name" class="form label">Employee Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old("name") }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="lastname" class="form label">Employee Lastname</label>
                    <input id="name" type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old("lastname") }}" required>
                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    
                </div>
                <div class="form-group col-6">
                    <label for="email" class="form label">Employee Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old("email") }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                </div>
                <div class="form-group col-6">
                    <label for="phone" class="form label">Employee Phone</label>
                    <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old("phone") }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                </div>
                <div class="form-group col-6">
                    <label for="company" class="form label">Employee Company</label>
                    <select id="company"  name="company_id" class="form-control @error('company_id') is-invalid @enderror" value="{{ old("company_id") }}" required>
                    <option value="">Select Company</option>
                        @forelse($companies as $company)
                     <option value="{{ $company->id }}">{{ $company->name }}</option>
                     @empty
                     <option value="">Not found</option>
                     @endforelse
                    </select>
                    @error('company_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success col-sm-2">Create</button>
                </div>
        </form>         
      
     </div>
</div>
 
@endsection

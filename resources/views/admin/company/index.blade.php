@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if ($errors->any())
        <div class="col-md-12">
            @foreach ($errors->all() as $error)
                   <p class="badge bg-danger"> {{$error}}</p>
            @endforeach
        </div>
        @endif
        @if(session()->has('success'))
        <div class="col-md-12 p-3">
            <p class="badge bg-success"> {{session()->get('success')}}</p>
         </div>
        @endif
        <div class="col-md-12 mb-2 border p-3 d-flex justify-content-end">
            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary" title="Create"><i class="fa fa-plus"></i></a>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                          ID
                        </td>
                        <td>
                            Logotype
                        </td>
                        <td>
                          Name
                        </td>
                        <td>
                          Email
                        </td>
                        <td>
                            Website
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                     <tr>
                        <td>
                            {{ $company->id }}
                        </td>
                        <td>
                          <img src="{{ preg_replace('/^public\//', '/storage/',$company->logotype) }}" alt="{{ $company->name }}" width="100px">
                        </td>
                        <td>
                            {{ $company->name }}
                        </td>
                        <td>
                            {{ $company->email }}
                        </td>
                        <td>
                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.companies.edit',$company->id) }}" class="btn btn-warning me-1" title="Edit"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route("admin.companies.destroy",$company->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                            </form>
                           </div>
                        </td>
                     </tr>
                     @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mt-3 d-flex justify-content-end">
            {!! $companies->links() !!}
        </div>
     </div>
</div>
 
@endsection

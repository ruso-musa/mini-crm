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
        <div class="col-md-12 mb-2 border p-3 d-flex justify-content-end">
            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary" title="Create"><i class="fa fa-plus"></i></a>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                          ID
                        </td>
                        <td>
                          Name
                        </td>
                        <td>
                            Lastname
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Phone
                        </td>
                        <td>
                            Company
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                     <tr>
                        <td>
                            {{ $employee->id }}
                        </td>
                        <td>
                            {{ $employee->name }}
                        </td>
                        <td>
                            {{ $employee->lastname }}
                        </td>
                        <td>
                            {{ $employee->email }}
                        </td>
                        <td>
                            {{ $employee->phone }}
                        </td>
                        <td>
                            {{ $employee->company->name ?? 'N/A' }}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.employees.edit',$employee->id) }}" class="btn btn-warning me-1" title="Edit"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route("admin.employees.destroy",$employee->id) }}" method="post">
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
            {!! $employees->links() !!}
        </div>
     </div>
</div>
 
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @admin
                   <ul class="nav flex-column">
                     <li class="nav-list"><a href="{{ route('admin.companies.index') }}" class="nav-link">Companies</a></li>
                     <li class="nav-list"><a href="{{ route('admin.employees.index') }}" class="nav-link">Employees</a></li>
                  </ul>
                  @endadmin
                </div>
            </div>
            <div class="col-md-12 text-center mt-5">
                <p class="lead">Welcome to Mini CRM!</p>
                <p class="lead">My Telegram: <a href="https://web.telegram.org/k/#@Ruso_musa" target="_blank">@Ruso_musa</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

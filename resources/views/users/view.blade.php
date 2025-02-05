@extends('layout.main')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">User Details</h4>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-sm-3 font-weight-bold">Name:</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $user->name }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 font-weight-bold">Email:</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 font-weight-bold">Account Created:</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">
                                {{ $user->created_at->format('d-m-Y h:i A') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-top mt-4 pt-3">
                <div class="text-right">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
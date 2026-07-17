@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <!-- Card Container -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="mb-4 text-gray-800">Input Data User</h4>
            
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="role" class="font-weight-bold">Roles</label>
                    <select class="form-control" name="roles" id="role">
                        <option value="">Pilihan</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4 shadow-sm">
                    Submit
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="mb-4 text-gray-800">Edit Data User: {{ $item->name }}</h4>
            
            <form action="{{ route('admin.user.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Wajib untuk proses Update -->
                
                <div class="form-group">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Password (Kosongkan jika tidak ingin ganti)</label>
                    <input type="password" class="form-control" name="password" placeholder="Password Baru">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Roles</label>
                    <select class="form-control" name="roles" required>
                        <option value="ADMIN" {{ $item->roles == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                        <option value="USER" {{ $item->roles == 'USER' ? 'selected' : '' }}>USER</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Update Data</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-block">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
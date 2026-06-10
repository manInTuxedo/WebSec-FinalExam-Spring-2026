@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assign Instructor / Course Admin Roles</h1>
    <table class="table">
        <thead><tr><th>User</th><th>Email</th><th>Current Role</th><th>Assign New Role</th></tr></thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->implode(', ') ?: 'None' }}</td>
                <td>
                    @foreach($roles as $role)
                        <form action="{{ route('admin.assign', [$user, $role->name]) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">{{ $role->name }}</button>
                        </form>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
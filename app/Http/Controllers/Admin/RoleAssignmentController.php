<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleAssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:course_admin']);
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::whereIn('name', ['instructor', 'course_admin'])->get();
        return view('admin.assign-roles', compact('users', 'roles'));
    }

    public function assign(User $user, $roleName)
    {
        if (!in_array($roleName, ['instructor', 'course_admin'])) {
            abort(403);
        }
        $user->syncRoles([$roleName]);
        return back()->with('success', "Role {$roleName} assigned to {$user->name}.");
    }
}
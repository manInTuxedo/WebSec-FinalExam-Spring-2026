<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions (exam requirements)
        Permission::firstOrCreate(['name' => 'upload_content']);
        Permission::firstOrCreate(['name' => 'enroll_course']);
        Permission::firstOrCreate(['name' => 'submit_assignment']);
        Permission::firstOrCreate(['name' => 'view_submissions']);   // for instructor
        Permission::firstOrCreate(['name' => 'assign_roles']);       // for admin

        // Create roles
        Role::firstOrCreate(['name' => 'course_admin']);
        Role::firstOrCreate(['name' => 'instructor']);
        Role::firstOrCreate(['name' => 'student']);

        // Assign permissions
        $instructor = Role::where('name', 'instructor')->first();
        $instructor->givePermissionTo(['upload_content', 'view_submissions']);

        $student = Role::where('name', 'student')->first();
        $student->givePermissionTo(['enroll_course', 'submit_assignment']);

        $admin = Role::where('name', 'course_admin')->first();
        $admin->givePermissionTo(Permission::all());
    }
}
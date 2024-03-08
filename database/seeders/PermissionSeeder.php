<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'Admin','guard_name'=> 'web']);
        $adminaccount = Role::create(['name' => 'Admin Account','guard_name'=> 'web']);
        $superuser = Role::create(['name' => 'Super User','guard_name'=> 'web']);
        $employer = Role::create(['name' => 'Employer','guard_name'=> 'web']);
        $seeker = Role::create(['name' => 'Seeker','guard_name'=> 'web']);

        $permissions = [

            ['id' => 1,  'name' => 'dashboard-dealer-view',            'guard_name'=> 'web'],
            ['id' => 2,  'name' => 'dashboard-candidate-view',            'guard_name'=> 'web'],
            ['id' => 3,  'name' => 'dashboard-user-view',            'guard_name'=> 'web'],
            ['id' => 4,  'name' => 'dashboard-role-view',            'guard_name'=> 'web'],
            ['id' => 5,  'name' => 'dashboard-permission-view',            'guard_name'=> 'web'],
            ['id' => 6,  'name' => 'dashboard-groupe-view',            'guard_name'=> 'web'],

            ['id' => 7,  'name' => 'approve-candidate',            'guard_name'=> 'web'],
            ['id' => 8,  'name' => 'reject-candidate',            'guard_name'=> 'web'],
            ['id' => 9,  'name' => 'panding-candidate',            'guard_name'=> 'web'],

            ['id' => 10,  'name' => 'approve-dealer',            'guard_name'=> 'web'],
            ['id' => 11,  'name' => 'reject-dealer',            'guard_name'=> 'web'],
            ['id' => 12,  'name' => 'panding-dealer',            'guard_name'=> 'web' ]
            
        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }
        $admin->syncPermissions(Permission::all());
        $superuser->syncPermissions(Permission::all());
        $adminaccount->syncPermissions([2,3,7,8,9]);
    }
}
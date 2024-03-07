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
        $seeker = Role::create(['name' => 'Seeker','guard_name'=> 'web']);

        $permissions = [

            ['id' => 1,  'name' => 'admin-create',                      'guard_name'=> 'web'],
            ['id' => 2,  'name' => 'admin-edit',                        'guard_name'=> 'web'],
            ['id' => 3,  'name' => 'admin-delete',                      'guard_name'=> 'web'],

            ['id' => 4,  'name' => 'admin-dashboard-create',            'guard_name'=> 'web'],
            ['id' => 5,  'name' => 'admin-dashboard-edit',              'guard_name'=> 'web'],
            ['id' => 6,  'name' => 'admin-dashboard-delete',            'guard_name'=> 'web'],

            ['id' => 7,  'name' => 'approve-candidate',                 'guard_name'=> 'web'],
            ['id' => 8,  'name' => 'approve-dealership',                'guard_name'=> 'web'],

            ['id' => 9,  'name' => 'pending-candidate',                 'guard_name'=> 'web'],
            ['id' => 10, 'name' => 'pending-dealership',                'guard_name'=> 'web'],

            ['id' => 11, 'name' => 'reject-candidate',                  'guard_name'=> 'web'],
            ['id' => 12, 'name' => 'reject-dealership',                 'guard_name'=> 'web'],
        ];

        foreach ($permissions as $item) {
            Permission::create($item);
        }
        $admin->syncPermissions(Permission::all());
        $adminaccount->syncPermissions(Permission::all());
        $superuser->syncPermissions([1,2,3,7,8,9,10,11,12]);
    }
}
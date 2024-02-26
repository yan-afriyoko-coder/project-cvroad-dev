<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Role;
// use App\Models\User;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         $this->call(LanguagesSeeder::class);
//         Role::truncate();
//         $adminRole = Role::create(['name' => 'admin']);
//         $admin = User::create([
//             'name' => 'admin',
//             'email' => 'admin@gmail.com',
//             'password' => bcrypt('password123'),
//             'email_verified_at' => NOW()
//         ]);
//     }
// }


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Creating permissions
        $permissions = [
            'create admin dashboard',
            'edit admin dashboard',
            'delete admin dashboard',
            'approve candidate',
            'reject candidate',
            'approve dealer',
            'reject dealer',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Creating role "Super User" and assigning permissions according to the requirements
        $superRole = Role::create(['name' => 'Super User']);
        $superRole->givePermissionTo([
            'create admin dashboard',
            'edit admin dashboard',
            'delete admin dashboard',
            'approve candidate',
            'reject candidate',
            'approve dealer',
            'reject dealer',
        ]);

        // Creating role "Admin Account" and assigning permissions according to the requirements
        $adminRole = Role::create(['name' => 'Admin Account']);
        $adminRole->givePermissionTo([
            'create admin dashboard',
            'edit admin dashboard',
            'delete admin dashboard',
            'approve candidate',
            'reject candidate',
        ]);
    }
}


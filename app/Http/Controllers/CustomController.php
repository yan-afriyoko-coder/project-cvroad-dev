<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class CustomController extends Controller
{
    public function resetRoles()
    {
        // Disable foreign key constraint checking
Schema::disableForeignKeyConstraints();

// Delete the brands table if it exists
if (Schema::hasTable('brands')) {
    Schema::dropIfExists('brands');
}

// Delete the roles table if it exists
if (Schema::hasTable('roles')) {
    Schema::dropIfExists('roles');
}

// Delete the categories table if it exists
if (Schema::hasTable('categories')) {
    Schema::dropIfExists('categories');
}

// Delete the dealerships table if it exists
if (Schema::hasTable('dealerships')) {
    Schema::dropIfExists('dealerships');
}

// Delete the drivers table if it exists
if (Schema::hasTable('drivers')) {
    Schema::dropIfExists('drivers');
}

// Delete the failed_jobs table if it exists
if (Schema::hasTable('failed_jobs')) {
    Schema::dropIfExists('failed_jobs');
}

// Delete the favourites table if it exists
if (Schema::hasTable('favourites')) {
    Schema::dropIfExists('favourites');
}

// Delete the groups table if it exists
if (Schema::hasTable('groups')) {
    Schema::dropIfExists('groups');
}

// Delete the jobs table if it exists
if (Schema::hasTable('jobs')) {
    Schema::dropIfExists('jobs');
}

// Delete the job_user table if it exists
if (Schema::hasTable('job_user')) {
    Schema::dropIfExists('job_user');
}

// Delete the job_users table if it exists
if (Schema::hasTable('job_users')) {
    Schema::dropIfExists('job_users');
}

// Delete the languages table if it exists
if (Schema::hasTable('languages')) {
    Schema::dropIfExists('languages');
}

// Delete the migrations table if it exists
if (Schema::hasTable('migrations')) {
    Schema::dropIfExists('migrations');
}

// Delete the password_reset_tokens table if it exists
if (Schema::hasTable('password_reset_tokens')) {
    Schema::dropIfExists('password_reset_tokens');
}

// Delete the permissions table if it exists
if (Schema::hasTable('permissions')) {
    Schema::dropIfExists('permissions');
}

// Delete the personal_access_tokens table if it exists
if (Schema::hasTable('personal_access_tokens')) {
    Schema::dropIfExists('personal_access_tokens');
}

// Delete the profiles table if it exists
if (Schema::hasTable('profiles')) {
    Schema::dropIfExists('profiles');
}

// Delete the provinces table if it exists
if (Schema::hasTable('provinces')) {
    Schema::dropIfExists('provinces');
}

// Delete the role_user table if it exists
if (Schema::hasTable('role_user')) {
    Schema::dropIfExists('role_user');
}

// Delete the titles table if it exists
if (Schema::hasTable('titles')) {
    Schema::dropIfExists('titles');
}

// Delete the users table if it exists
if (Schema::hasTable('users')) {
    Schema::dropIfExists('users');
}

// Delete the work_experiences table if it exists
if (Schema::hasTable('work_experiences')) {
    Schema::dropIfExists('work_experiences');
}

// Delete the model_has_permissions table if it exists
if (Schema::hasTable('model_has_permissions')) {
    Schema::dropIfExists('model_has_permissions');
}

// Delete the model_has_roles table if it exists
if (Schema::hasTable('model_has_roles')) {
    Schema::dropIfExists('model_has_roles');
}

// Delete the password_resets table if it exists
if (Schema::hasTable('password_resets')) {
    Schema::dropIfExists('password_resets');
}

// Delete the salary_ranges table if it exists
if (Schema::hasTable('salary_ranges')) {
    Schema::dropIfExists('salary_ranges');
}

// Delete the role_has_permissions table if it exists
if (Schema::hasTable('role_has_permissions')) {
    Schema::dropIfExists('role_has_permissions');
}

// Enable foreign key constraint checking again
Schema::enableForeignKeyConstraints();

// Path to the SQL file within the Laravel project
$filePath = storage_path('sql/dev_db.sql');

// Read the contents of the SQL file
$sqlScript = file_get_contents($filePath);

// Execute the SQL script
DB::unprepared($sqlScript);

// Run migrations to ensure tables are created
Artisan::call('migrate');

// Delete Admin role if it exists
if (Role::where('name', 'Admin')->exists()) {
    Role::where('name', 'Admin')->delete();
}

// Delete Admin Account role if it exists
if (Role::where('name', 'Admin Account')->exists()) {
    Role::where('name', 'Admin Account')->delete();
}

// Delete Super User role if it exists
if (Role::where('name', 'Super User')->exists()) {
    Role::where('name', 'Super User')->delete();
}

// Delete permission with ID 6 if it exists
if (Permission::where('id', 6)->exists()) {
    Permission::where('id', 6)->delete();
}

// Delete permission with ID 7 if it exists
if (Permission::where('id', 7)->exists()) {
    Permission::where('id', 7)->delete();
}

// Delete permission with ID 8 if it exists
if (Permission::where('id', 8)->exists()) {
    Permission::where('id', 8)->delete();
}

// Delete permission with ID 9 if it exists
if (Permission::where('id', 9)->exists()) {
    Permission::where('id', 9)->delete();
}

// Delete permission with ID 11 if it exists
if (Permission::where('id', 11)->exists()) {
    Permission::where('id', 11)->delete();
}

// Delete permission with ID 12 if it exists
if (Permission::where('id', 12)->exists()) {
    Permission::where('id', 12)->delete();
}

// Run seeders if needed
Artisan::call('db:seed', [
    '--class' => 'LanguagesSeeder', // Adjust with your seeder name
    '--class' => 'PermissionSeeder' // Adjust with your seeder name
]);

return 'Roles table has been dropped and recreated.';

    }
}

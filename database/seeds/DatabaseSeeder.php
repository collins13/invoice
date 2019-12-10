<?php

use Illuminate\Database\Seeder;
use Invoice\User;
use Invoice\Role;
use Invoice\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(ProfileTableSeeder::class);

                // $this->call(UsersTableSeeder::class);
                DB::table('users')->delete();
                //1) Create Admin Role
                $role = ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'Full Permission'];
                $role = Role::create($role);
                //2) Set Role Permissions
                // Get all permission, swift through and attach them to the role
                $permission = Permission::get();
                foreach ($permission as $key => $value) {
                    $role->attachPermission($value);
                }
                //3) Create Admin User
                $user = ['name' => 'Admin User', 'email' => 'adminecotech@gmail.com', 'password' => Hash::make('password')];
                $user = User::create($user);
                //4) Set User Role
                $user->attachRole($role);
        
    }
}

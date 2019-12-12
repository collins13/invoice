<?php

use Illuminate\Database\Seeder;
use Invoice\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permission = [
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'List All Roles'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update Role',
                'description' => 'Update Role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'List All Users'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Update User',
                'description' => 'Update User Information'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
                'name' => 'invoice-create',
                'display_name' => 'Create invoice',
                'description' => 'Create New invoice'
            ],
            [
                'name' => 'invoice-list',
                'display_name' => 'Display invoice Listing',
                'description' => 'List All invoice'
            ],
            [
                'name' => 'invoice-update',
                'display_name' => 'Update invoice',
                'description' => 'Update invoice Information'
            ],
            [
                'name' => 'invoice-delete',
                'display_name' => 'Delete invoice',
                'description' => 'Delete invoice Information'
            ],
            // [
            //     'name' => 'job-create',
            //     'display_name' => 'Create Job',
            //     'description' => 'Create New Job'
            // ],
            // [
            //     'name' => 'job-list',
            //     'display_name' => 'Display Job Listing',
            //     'description' => 'List All Job'
            // ],
            // [
            //     'name' => 'job-update',
            //     'display_name' => 'Update Job',
            //     'description' => 'Update Job Information'
            // ],
            // [
            //     'name' => 'job-delete',
            //     'display_name' => 'Delete Job',
            //     'description' => 'Delete Job Information'
            // ],
            // [
            //     'name' => 'candidate-create',
            //     'display_name' => 'Create Candidate',
            //     'description' => 'Create New Candidate'
            // ],
            // [
            //     'name' => 'candidate-list',
            //     'display_name' => 'Display Candidate Listing',
            //     'description' => 'List All Candidate'
            // ],
            // [
            //     'name' => 'candidate-update',
            //     'display_name' => 'Update Candidate',
            //     'description' => 'Update Candidate Information'
            // ],
            // [
            //     'name' => 'candidate-delete',
            //     'display_name' => 'Delete Candidate',
            //     'description' => 'Delete Candidate Information'
            // ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}

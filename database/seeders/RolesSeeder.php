<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Access to the dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Access to list of users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Access to edit users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update',
                            'description' => 'Access to update users'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Access to list of categories'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Access to create categories'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Access to edit categories'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Access to delete categories'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'Access to list of tags'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Access to create tags'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Access to edit tags'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Access to delete tags'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bloggers.index',
                            'description' => 'Access to view of bloggers presentation'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bloggers.create',
                            'description' => 'Access to create blogger presentation'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.bloggers.edit',
                            'description' => 'Access to edit blogger presentation'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Access to list of posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Access to create posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Access to edit posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Access to delete posts'])->syncRoles([$role1, $role2]);

        
    }
}
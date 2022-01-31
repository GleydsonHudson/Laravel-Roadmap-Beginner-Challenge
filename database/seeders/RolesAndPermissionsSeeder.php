<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames = ['create user', 'view user', 'edit user', 'delete user',
            'create post', 'view post', 'edit post', 'delete post', 'publish post', 'unpublish post',
            'create category', 'view category', 'edit category', 'delete category',
            'create tag', 'view tag', 'edit tag', 'delete tag',
        ];

        $permissionsByRole = [
            'admin'  => ['create user', 'view user', 'edit user', 'delete user',
                'create post', 'view post', 'edit post', 'delete post', 'publish post', 'unpublish post',
                'create category', 'view category', 'edit category', 'delete category',
                'create tag', 'view tag', 'edit tag', 'delete tag',
            ],
            'editor' => ['create post', 'view post', 'edit post', 'delete post', 'publish post', 'unpublish post',
                'create category', 'view category', 'edit category', 'delete category',
                'create tag', 'view tag', 'edit tag', 'delete tag',
            ],
            'writer' => ['create post', 'view post', 'edit post',],
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name'       => $permission,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
            ];
        });

        Permission::insert($permissions->toArray());

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'editor'])->givePermissionTo($permissionsByRole['editor']);
        Role::create(['name' => 'writer'])->givePermissionTo($permissionsByRole['writer']);


    }
}

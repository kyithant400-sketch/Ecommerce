<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'access admin',
            'category.index',
            'category.create',
            'category.edit',
            'category.delete',
            'product.create',
            'product.edit',
            'product.index',
            'product.delete',
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'user.index',
            'user.edit',
            'user.delete',
            'order.index',
            'order.accept',
            'order.cancle',
            'order.delete',
            'create order'

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
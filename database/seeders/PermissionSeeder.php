<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view permission',
            'create permission',
            'edit permission',
            'delete permission',
            'view role',
            'create role',
            'edit role',
            'delete role',
            'view user',
            'create user',
            'edit user',
            'delete user',
            'view-blog-category',
            'create-blog-category',
            'edit-blog-category',
            'delete-blog-category',
            'view-blog',
            'create-blog',
            'edit-blog',
            'delete-blog',
            'edit-blog-status',
            'view-book',
            'create-book',
            'edit-book',
            'delete-book',
            'edit-book-status',
            'book-details',
            'view-package',
            'create-package',
            'edit-package',
            'delete-package',
            'view-about-us',
            'create-about-us',
            'edit-about-us',
            'delete-about-us',
            'view-testimonial',
            'create-testimonial',
            'edit-testimonial',
            'delete-testimonial',
            'view-contact-message'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'barber_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'barbershop_create',
            ],
            [
                'id'    => 19,
                'title' => 'barbershop_edit',
            ],
            [
                'id'    => 20,
                'title' => 'barbershop_show',
            ],
            [
                'id'    => 21,
                'title' => 'barbershop_delete',
            ],
            [
                'id'    => 22,
                'title' => 'barbershop_access',
            ],
            [
                'id'    => 23,
                'title' => 'service_create',
            ],
            [
                'id'    => 24,
                'title' => 'service_edit',
            ],
            [
                'id'    => 25,
                'title' => 'service_show',
            ],
            [
                'id'    => 26,
                'title' => 'service_delete',
            ],
            [
                'id'    => 27,
                'title' => 'service_access',
            ],
            [
                'id'    => 28,
                'title' => 'stylist_create',
            ],
            [
                'id'    => 29,
                'title' => 'stylist_edit',
            ],
            [
                'id'    => 30,
                'title' => 'stylist_show',
            ],
            [
                'id'    => 31,
                'title' => 'stylist_delete',
            ],
            [
                'id'    => 32,
                'title' => 'stylist_access',
            ],
            [
                'id'    => 33,
                'title' => 'service_booking_create',
            ],
            [
                'id'    => 34,
                'title' => 'service_booking_edit',
            ],
            [
                'id'    => 35,
                'title' => 'service_booking_show',
            ],
            [
                'id'    => 36,
                'title' => 'service_booking_delete',
            ],
            [
                'id'    => 37,
                'title' => 'service_booking_access',
            ],
            [
                'id'    => 38,
                'title' => 'setting_create',
            ],
            [
                'id'    => 39,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 40,
                'title' => 'setting_show',
            ],
            [
                'id'    => 41,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 42,
                'title' => 'setting_access',
            ],
            [
                'id'    => 43,
                'title' => 'service_temp_create',
            ],
            [
                'id'    => 44,
                'title' => 'service_temp_delete',
            ],
            [
                'id'    => 45,
                'title' => 'service_temp_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
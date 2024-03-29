<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ServicesTableSeeder::class,
            EmployeesTableSeeder::class,
            PatientsTableSeeder::class,
            AppointmentsTableSeeder::class,
            PrescriptionTableSeeder::class,
        ]);
    }
}

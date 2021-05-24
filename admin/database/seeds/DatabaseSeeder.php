<?php

use Illuminate\Database\Seeder;

use App\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use App\Models\Country;
class DatabaseSeeder extends Seeder
{
    public function run()

    {


        $this->call(CountryTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $user = User::create([

            'name' => 'Hardik Savani',
            'email' => 'admin@gmail.com',
            'status'=>'1',
            'password' => bcrypt('123456')

        ]);

        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
}

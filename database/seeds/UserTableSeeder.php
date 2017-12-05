<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::where('name', 'admin')->first();
        $role_editor = Role::where('name', 'editor')->first();
        $role_user = Role::where('name', 'user')->first();

        $user = new App\User();
        $user->name = 'Jarno Ruokamo';
        $user->email = 'jarno@example.org';
        $user->password = bcrypt('salasana');
        $user->save();
        $user->roles()->attach($role_admin);
        $user->roles()->attach($role_user);

        $user = new App\User();
        $user->name = 'Jarmo Ruokamo';
        $user->email = 'jarno@example.com';
        $user->password = bcrypt('salasana');
        $user->save();
        $user->roles()->attach($role_editor);
        $user->roles()->attach($role_user);

        $user = new App\User();
        $user->name = 'Jarppi Ruokamo';
        $user->email = 'jarno@example.net';
        $user->password = bcrypt('salasana');
        $user->save();
        $user->roles()->attach($role_user);
    }
}

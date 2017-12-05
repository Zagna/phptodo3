<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = new App\Role();
        $role_user->name = 'user';
        $role_user->description = 'Basic user, can write todos';
        $role_user->save();

        $role_editor = new App\Role();
        $role_editor->name = 'editor';
        $role_editor->description = 'Editor, can write todos and edit others';
        $role_editor->save();

        $role_admin = new App\Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Can edit everything and change sections';
        $role_admin->save();
    }
}

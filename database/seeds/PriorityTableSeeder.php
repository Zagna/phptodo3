<?php

use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $priority = new App\Priority();
        $priority->name = 'Idea';
        $priority->color = '#00BFFF';
        $priority->save();

        $priority = new App\Priority();
        $priority->name = 'Normal';
        $priority->color = '#FFFFFF';
        $priority->save();

        $priority = new App\Priority();
        $priority->name = 'Medium';
        $priority->color = '#F08080';
        $priority->save();

        $priority = new App\Priority();
        $priority->name = 'High';
        $priority->color = '#CD5C5C';
        $priority->save();

        $priority = new App\Priority();
        $priority->name = 'Blocking';
        $priority->color = '#DC143C';
        $priority->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::first();
        $user->section()->create(['body' => 'Testaus']);
        $user->section()->create(['body' => 'Testing']);
    }
}

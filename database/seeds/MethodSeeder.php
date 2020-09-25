<?php

use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('methods')->insert([

            [
                'name' => 'Workshop/Self Learning',
            ],
            [
                'name' => "Sharing Practice/Professional's Talk",
            ],
            [
                'name' => 'Disscusion Room',
            ],
            [
                'name' => 'Coaching',
            ],
            [
                'name' => 'Mentoring',
            ],
        ]);
    }
}

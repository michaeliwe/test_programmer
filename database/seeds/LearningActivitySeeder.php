<?php

use Illuminate\Database\Seeder;

class LearningActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('learning_activities')->insert([
            [
                'name' => 'Fundamental of Superintendence',
                'start_date' => '2019-01-02',
                'end_date' => '2019-01-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Introduction to TIC Industry',
                'start_date' => '2019-01-03',
                'end_date' => '2019-01-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Rindam "Bela Negara"',
                'start_date' => '2019-01-04',
                'end_date' => '2019-01-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Basic Finance for Business',
                'start_date' => '2019-01-10',
                'end_date' => '2019-01-15',
                'method_id' => '1',
            ],
            [
                'name' => 'Basic Auditing',
                'start_date' => '2019-02-02',
                'end_date' => '2019-02-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Business Legal',
                'start_date' => '2019-02-03',
                'end_date' => '2019-02-05',
                'method_id' => '1',
            ],
            [
                'name' => 'General Affair',
                'start_date' => '2019-02-04',
                'end_date' => '2019-02-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Risk Management',
                'start_date' => '2019-02-12',
                'end_date' => '2019-02-15',
                'method_id' => '1',
            ],
            [
                'name' => 'Basic Business Process',
                'start_date' => '2019-02-12',
                'end_date' => '2019-02-15',
                'method_id' => '1',
            ],
            [
                'name' => 'Basic Salesmanship',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Creative Thinking',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Data Analytics',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Managing Self Motivation',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Problem Solving & Decision Making',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Managing Performance',
                'start_date' => '2019-06-02',
                'end_date' => '2019-06-05',
                'method_id' => '1',
            ],
            [
                'name' => 'Sharing Practice',
                'start_date' => '2019-03-12',
                'end_date' => '2019-03-15',
                'method_id' => '2',
            ],
            [
                'name' => 'Sharing Practice',
                'start_date' => '2019-05-12',
                'end_date' => '2019-05-15',
                'method_id' => '2',
            ],
            [
                'name' => 'Ask The Expert',
                'start_date' => '2019-03-02',
                'end_date' => '2019-03-05',
                'method_id' => '3',
            ],
            [
                'name' => 'Ask The Expert',
                'start_date' => '2019-04-12',
                'end_date' => '2019-04-15',
                'method_id' => '3',
            ],
            [
                'name' => 'Ask The Expert',
                'start_date' => '2019-05-02',
                'end_date' => '2019-05-05',
                'method_id' => '3',
            ],
            [
                'name' => 'Group Coaching',
                'start_date' => '2019-05-12',
                'end_date' => '2019-05-15',
                'method_id' => '4',
            ],
            [
                'name' => 'Mentoring Session',
                'start_date' => '2019-03-05',
                'end_date' => '2019-03-10',
                'method_id' => '5',
            ],
            [
                'name' => 'Mentoring Session',
                'start_date' => '2019-04-12',
                'end_date' => '2019-04-15',
                'method_id' => '5',
            ],
            [
                'name' => 'Mentoring Session',
                'start_date' => '2019-05-02',
                'end_date' => '2019-05-05',
                'method_id' => '5',
            ],
        ]);
    }
}

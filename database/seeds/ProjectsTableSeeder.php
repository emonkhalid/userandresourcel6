<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            /*'name' => 'others',
            'slug' => 'others-category',
            'description' => 'This category named as others',*/
            [
                'name' => 'Project Name 1',
                'slug' => 'project-name-1',
                'description' => 'Project Description 1',
                'category_id' => 1,
                'photo_id'	=> 1,
            ],
            [
                'name' => 'অর্থহীন লেখা যার মাঝে আছে অনেক 2',
                'slug' => 'অর্থহীন-লেখা-যার-মাঝে-আছে-অনেক-2',
                'description' => 'অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। যেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে অর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?',
                'category_id' => 2,
                'photo_id'	=> 1,
            ],
            [
                'name' => 'Project Name 3',
                'slug' => 'project-name-3',
                'description' => 'Project Description 3',
                'category_id' => 3,
                'photo_id'	=> 1,
            ]
        ]);
    }
}

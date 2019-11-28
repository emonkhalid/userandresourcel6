<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            /*'name' => 'others',
            'slug' => 'others-category',
            'description' => 'This category named as others',*/
            [
                'title' => 'News Title 1',
                'slug' => 'news-title-1',
                'description' => 'News Churchill, if the nation should last for 1,000 years, people may look back and say: This was their saddest hour. Actually, never mind: Brexit may cause the United Kingdom to fragment, so that the country might not last a decade more, let alone last a millennium.',
                'photo_id'	=> null,
                'status' => 1,
            ],
            [
                'title' => 'অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ,',
                'slug' => 'অর্থহীন-লেখা-যার-মাঝে-আছে-অনেক-কিছু।-হ্যাঁ,',
                'description' => ' অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। যেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে অর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?',
                'photo_id'	=> null,
                'status' => 1,

            ],
            [
                'title' => 'Will Great Britain become Little England?',
                'slug' => 'news-title-3',
                'description' => 'To paraphrase Churchill, if the nation should last for 1,000 years, people may look back and say: This was their saddest hour. Actually, never mind: Brexit may cause the United Kingdom to fragment, so that the country might not last a decade more, let alone last a millennium.',
                'photo_id'	=> null,
                'status' => 1,
            ]
        ]);
    }
}

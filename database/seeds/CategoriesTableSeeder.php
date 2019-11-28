<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            /*'name' => 'others',
            'slug' => 'others-category',
            'description' => 'This category named as others',*/
            [
                'name' => 'Others',
                'slug' => 'othres-category',
                'description' => 'Other Category Description',
                'photo_id' => null,
            ],
            [
                'name' => 'আন্তর্জাতিক',
                'slug' => 'বিশ্বের-ধনীদের-সম্পদ-কমছে',
                'description' => 'বিশ্বের ধনীদের সম্পদ কমছে, ৩৮ হাজার ৮০০ কোটি ডলার হাওয়া',
                'photo_id' => null,
            ],
            [
                'name' => 'Software',
                'slug' => 'software-category',
                'description' => 'Software Category Description',
                'photo_id' => null,
            ]
        ]);
    }
}

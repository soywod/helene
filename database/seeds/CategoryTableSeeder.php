<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'aquarelles abstraites',
                'slug' => 'abstract-watercolor'
            ],
	        [
		        'name' => 'natures mortes',
		        'slug' => 'still-life'
	        ],
	        [
		        'name' => 'marines',
		        'slug' => 'marine'
	        ],
	        [
		        'name' => 'paysages',
		        'slug' => 'landscape'
	        ],
        ]);
    }
}

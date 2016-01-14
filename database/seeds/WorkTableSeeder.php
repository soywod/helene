<?php

use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('works')->truncate();
		DB::table('works')->insert([
			[
				'title'       => 'img1',
				'thumbnail'   => 'img1.jpg',
				'category_id' => 1,
				'user_id'     => 1,
			],
			[
				'title'     => 'img2',
				'thumbnail' => 'img2.jpg',
				'category_id' => 1,
				'user_id'   => 1,
			],
			[
				'title'     => 'img3',
				'thumbnail' => 'img3.jpg',
				'category_id' => 2,
				'user_id'   => 1,
			],
			[
				'title'     => 'img4',
				'thumbnail' => 'img4.jpg',
				'category_id' => 2,
				'user_id'   => 1,
			],
			[
				'title'     => 'img5',
				'thumbnail' => 'img5.jpg',
				'category_id' => 2,
				'user_id'   => 1,
			],
			[
				'title'     => 'img6',
				'thumbnail' => 'img6.jpg',
				'category_id' => 2,
				'user_id'   => 1,
			],
			[
				'title'     => 'img7',
				'thumbnail' => 'img7.jpg',
				'category_id' => 2,
				'user_id'   => 1,
			],
			[
				'title'     => 'img8',
				'thumbnail' => 'img8.jpg',
				'category_id' => 3,
				'user_id'   => 1,
			],
		]);
	}
}

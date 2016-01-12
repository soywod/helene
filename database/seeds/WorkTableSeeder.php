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
				'title'     => 'img1',
				'thumbnail' => 'img1.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img2',
				'thumbnail' => 'img2.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img3',
				'thumbnail' => 'img3.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img4',
				'thumbnail' => 'img4.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img5',
				'thumbnail' => 'img5.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img6',
				'thumbnail' => 'img6.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img7',
				'thumbnail' => 'img7.jpg',
				'user_id'   => 1,
			],
			[
				'title'     => 'img8',
				'thumbnail' => 'img8.jpg',
				'user_id'   => 1,
			],
		]);
	}
}

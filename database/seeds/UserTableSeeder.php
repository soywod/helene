<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();
		DB::table('users')->insert([
			[
				'name'      => 'helene',
				'email'     => 'helene@mail.com',
				'thumbnail' => 'default.png',
				'desc'      => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci autem cum debitis dolorem doloribus enim maxime, minus nihil nisi pariatur perspiciatis praesentium reiciendis repellendus sed voluptatum. Corporis dignissimos esse libero molestiae molestias voluptate. Aliquid, amet atque consequuntur culpa cumque cupiditate delectus dignissimos, distinctio doloremque dolorum eaque eligendi eos esse fugit illum in iusto maiores, molestias natus odio officiis pariatur qui quo ratione rem rerum sapiente sint sit soluta tempore ullam vel voluptas voluptatibus. Ad aut ex fuga maxime necessitatibus quos veritatis. Alias blanditiis laudantium modi, nesciunt pariatur porro possimus repudiandae! Commodi dolores ea eius esse facere laboriosam nam officia sint.",
				'password'  => Hash::make('helene'),
			],
		]);
	}
}

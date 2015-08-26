<?php
use Faker\Factory as Faker;
class PostsSeeder extends Seeder {
	public function run()
	{

		$faker =Faker::create();

		for($i=1; $i<=23; $i++)
		{

			$post = new Post();
			$post->title = $faker->catchPhrase;
			$post->body = $faker->realText;
			$post->user_id = User::all()->random(1)->id;
			$post->save();
		}
		
	}
}
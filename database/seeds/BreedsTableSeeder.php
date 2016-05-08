<?php


use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder 
{
	public function run() 
	{
		DB::table('breeds')->insert([
			['id' => 1, 'name' => "bulldog"],
			['id' => 2, 'name' => "Pug"],
			['id' => 3, 'name' => "boxer"],
			['id' => 4, 'name' => "poodle"],
		]);
	}
}

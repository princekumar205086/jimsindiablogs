<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		\App\Page::factory()->count(5)->create();
	}
}

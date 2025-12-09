<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		\App\Gallery::factory()->count(15)->create();
	}
}

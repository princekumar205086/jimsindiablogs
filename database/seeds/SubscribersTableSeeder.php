<?php

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		\App\Subscriber::factory()->count(100)->create();
	}
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Seed in proper order due to foreign key dependencies
		
		// 1. Independent tables first
		$this->call(SettingsTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(CategoriesTableSeeder::class);
		$this->call(TagsTableSeeder::class);
		
		// 2. Tables that depend on categories and users
		$this->call(PostsTableSeeder::class);
		$this->call(PagesTableSeeder::class);
		$this->call(GalleriesTableSeeder::class);
		
		// 3. Tables that depend on posts
		$this->call(CommentsTableSeeder::class);
		
		// 4. Subscribers (independent)
		$this->call(SubscribersTableSeeder::class);
		
		$this->command->info('All seeders completed successfully!');
	}
}

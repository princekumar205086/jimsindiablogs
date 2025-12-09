<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Page;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		// Skip if running migrations to avoid querying non-existent tables
		if (app()->runningInConsole() && !app()->runningUnitTests()) {
			if (request()->server('argv')[1] ?? null === 'migrate:fresh') {
				return;
			}
		}

		// Ensure a default $setting is available in all views to avoid null property errors
		try {
			$setting = Setting::first();
		} catch (\Exception $e) {
			$setting = null;
		}
		if (!$setting) {
			$setting = (object) [
				'website_title' => config('app.name'),
				'meta_title' => config('app.name'),
				'meta_keywords' => '',
				'meta_description' => '',
				'copyright' => '',
				'logo' => 'images/logo.png',
				'favicon' => 'favicon.png',
				'facebook' => '',
				'twitter' => '',
				'github' => '',
				'linkedin' => '',
			];
		}
		View::share('setting', $setting);

		View::composer(['web.includes.sidebar'], function ($view) use ($setting) {
			$categories = Category::where('publication_status', 1)->orderBy('category_name')->get(['id', 'category_name']);
			$tags = Tag::where('publication_status', 1)->orderBy('tag_name')->get(['id', 'tag_name']);
			$setting = Setting::first() ?? $setting;
			$view->with(compact('categories', 'tags', 'setting'));
		});

		View::composer(['web.includes.header', 'web.includes.footer'], function ($view) use ($setting) {
			$setting = Setting::first() ?? $setting;
			$pages = Page::where('publication_status', 1)->get(['page_name', 'page_slug']);
			$view->with(compact('setting', 'pages'));
		});

		View::composer(['admin.includes.header'], function ($view) {
			$comments = Comment::where('publication_status', 0)->get(['id']);
			$posts = Post::where('publication_status', 0)->get(['id']);
			$view->with(compact('comments', 'posts'));
		});

		View::composer(['web.includes.head'], function ($view) use ($setting) {
			$setting = Setting::first(['website_title']) ?? $setting;
			$view->with(compact('setting'));
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}

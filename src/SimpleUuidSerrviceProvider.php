<?php

namespace Adnane\SimpleUuid;
use Illuminate\Support\ServiceProvider;

class SimpleUuidServiceProvider extends ServiceProvider
{
    /**
	 * Bootstrap any application services.
	 *
	 * @return string
	 */
	public function boot() { /*..*/ }

    /**
	 * Register any application services.
	 *
	 * @return void
	 */
    public function register()
    {
        $this->app->make('Adnane\SimpleUuid\Traits\SimpleUuid');
    }
}

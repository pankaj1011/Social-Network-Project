<?php

namespace Dog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	public function boot(ViewFactory $view) 
	{
		$view->composer('partials.forms.dog', 'Dog\Http\Views\Composers\DogFormComposer');
		//$this->app['view']->composer('partials.forms.dog', 'Dog\Http\Views\Composers\DogFormComposer');
	}
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

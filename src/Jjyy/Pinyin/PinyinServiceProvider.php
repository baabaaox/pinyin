<?php namespace Jjyy\Pinyin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class PinyinServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jjyy/pinyin');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['pinyin'] = $this->app->share(function($app) {
			return new Pinyin;
  		});

		$this->app->booting(function() {
		    AliasLoader::getInstance()->alias('Pinyin', 'Jjyy\Pinyin\Pinyin');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}

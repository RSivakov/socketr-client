<?php namespace Agwood\SocketrClient;

use Illuminate\Support\ServiceProvider;
use Agwood\SocketrClient\SocketrClient;

class SocketrClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

    $this->app->bind('agwood::socketr-client',function(){

      $SocketrClient = new SocketrClient(new \ZMQContext());
      $SocketrClient->connect('tcp://localhost:5555');

      return $SocketrClient;

    });

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('agwood::socketr-client');
	}

}

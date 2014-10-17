<?php namespace Agwood\SocketrClient\Facades;

use Illuminate\Support\Facades\Facade;

class Socketr extends Facade {

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'agwood::socketr-client'; }

}

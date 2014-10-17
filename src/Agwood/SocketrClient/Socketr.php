<?php namespace Agwood\SocketrClient;


class Socketr {

  protected $tcp_connection_string;
  protected $socket;

  public function __construct($tcp_connection_string,\ZMQContext $context){

    $this->tcp_connection_string = $tcp_connection_string;
    $this->socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'socketr');
    $this->socket->connect($this->tcp_connection_string);

  }

  public function msg($data){

    $this->socket->send(json_encode(array(
        'topic' => 'anything'
    )));

  }

}

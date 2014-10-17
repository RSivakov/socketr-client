<?php namespace Agwood\SocketrClient;


class SocketrClient {

  protected $tcp_connection_string;
  protected $socket;

  public function __construct(\ZMQContext $context){

    $this->socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'socketr');

  }

  public function connect($tcp_connection_string){

    $this->socket->connect($tcp_connection_string);

  }

  public function msg($topic,$data=array()){

    if(!is_string($data)){
      $data = json_encode($data);
    }

    $this->socket->send(json_encode(array(
        'channel' => '',
        'topic' => $topic,
        'data' => $data,
    )));

  }

}

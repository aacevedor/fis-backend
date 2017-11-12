<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
class PushNotification extends Model
{

  function __construct(){
    $this->end_point = env('IONIC_PUSH_API');
    $this->token = env('IONIC_TOKEN');
    $this->profile = env('IONIC_PROFILE');
    $this->send_to_all = false;
    $this->emails = [];
    $this->notification;
    $this->data;
  }

  public function add_send_to_all($send_to_all = null){
    $this->send_to_all = $send_to_all;
  }

  public function add_emails( $emails = [] ){
    $this->emails = $emails;
  }

  public function add_query( $query = null ){
     $this->query = $query;
  }
  public function message($message = null){
    $this->message = $message;

  }
  public function payload( $payload = null){
    $this->payload = $payload;
  }
  public function android($priority = null, $message = null, $title = null){
    $this->android = array('priority' => $priority,
                             'message'  => $message,
                             'title'    => $title
                           );
  }

  public function build(){
    $this->notification = array( 'query' => $this->query, 'message' => $this->message,'payload' => $this->payload, 'android'=> $this->android );
    $this->data = array(
      'profile' => $this->profile,
      'send_to_all' => $this->send_to_all,
      'notification' => $this->notification,
      'emails' => $this->emails,
    );
  }

  public function send(){
    $headers = array(
      'Authorization'=> "Bearer ". $this->token,
    //  'Content-Type'=> "application/json"
    );

    $client = new Client();
    $request = $client->post($this->end_point, ['json'=> (array)$this->data, 'headers'=> $headers],array('timeout'=> 60, 'connect_timeout' => 2));
    $request->getBody();

    dd(json_decode($request->getBody()->getContents(), true));
  }

}

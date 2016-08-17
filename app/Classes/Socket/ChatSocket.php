<?php
/**
 * Created by PhpStorm.
 * User: Sanik
 * Date: 09.08.2016
 * Time: 15:40
 */

namespace App\Classes\Socket;

use App\Classes\Socket\Base\BaseSocket;
use Ratchet\ConnectionInterface;

use App;
use App\Models\User;
use Illuminate\Session\SessionManager;
use App\Http\Controllers\Controller;

class ChatSocket extends BaseSocket
{
    protected $clients;
    public function __construct()
    {

        $this->clients=new \SplObjectStorage;
    }
    public function onOpen (ConnectionInterface $conn)
    {
        $user=new User();
        /*
        $this->clients->attach($conn);
        // Create a new session handler for this client
        $session = (new SessionManager(App::getInstance()))->driver();
        // Get the cookies
        $cookies = $conn->WebSocket->request->getCookies();
        // Get the laravel's one
        $laravelCookie = urldecode($cookies[Config::get('session.cookie')]);
        // get the user session id from it
        $idSession = Crypt::decrypt($laravelCookie);
        // Set the session id to the session handler
        $session->setId($idSession);
        // Bind the session handler to the client connection
        $conn->session = $session;
        */
        $this->clients->attach($conn);
        //$conn->resourceId="999";
        // TODO: make cookies to laravel aut method
        $cookies=$conn->WebSocket->request->getCookies();
        if(isset($cookies['user_key']) && $cookies['user_key']!=null){
            echo 'Total users: '.($numRecv=count($this->clients))."\n";
        }else{
            echo "No cookies! \n";
            $conn->close();
        }
        $conn->resourceId=$user->getUserIdSession($cookies['user_key']);
        echo "new connection! User_id = {$conn->resourceId}"."\n";

    }

    /**
     * @param ConnectionInterface $from
     * @param string $client_msg
     */
    public function onMessage(ConnectionInterface $from, $client_msg)
    {
        $to=false;
        $status=false;
        $client_msg=json_decode($client_msg,true);
        $to_id=User::getUserIdSession($client_msg['to_id']);
        $message=$client_msg['message'];
        // TODO: Im noob... Ned rewrite without foreach $this->clients[$to_id]->send($message);
        if(isset($to_id) && $to_id!="not_found"){
            foreach ($this->clients as $client) {
                if($to_id == $client->resourceId){
                    $to=$client;
                    $status=true;
                    if($client_msg["value"]=='invite'){
                        $status="send_invite";
                    }else if($client_msg["value"]=='message'){
                        $status="message";
                    }else if($client_msg["value"]=='accepted'){
                        $status="invite_accepted";
                    }

                }else{
                    if($status==null || $status == false){
                        $status="not_online";
                    }
                }
            }
            $this->send($message,$status,$from,$to);
        }else{
            $status="user_not_found_in_tk_list";
            $this->send($message,$status,$from);
        }
    }
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "connection {$conn->resourceId} has dissconected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    private function send($message=null,$status=false,$from,$to=null,$option=0)
    {
        if($from != null){
            $from_token = User::getUserSessionId($from->resourceId);
        }

        if ($to == false) {

            $to_send = [
                'text_message' => Controller::robot($message),
                'status' => $status,
            ];
            $from->send(json_encode($to_send));
            echo sprintf('sending message from %d  to *(Not FOUND!) ' . "\n" . 'Message: "%s"' . "\n"
                , $from->resourceId, $message);


        } else if ($status=="send_invite"){
            $to_send=[
                'text_message'=>Controller::robot($message),
                'from' => $from_token,// User::getUserSessionId(
                'from_user_data' => $user_contact_list_data[]=User::getUserShtInfo($from->resourceId),
                'status'=>$status,
            ];
            echo sprintf('sending invite from %d  to %d '."\n"
                , $from->resourceId, $to->resourceId );
            $to->send(json_encode($to_send));


        } else if ($status=="message"){
            $to_send=[
                'text_message'=>Controller::robot($message),
                'from' =>$from_token,
                'status'=>$status,
            ];
            $to->send(json_encode($to_send));
            echo sprintf('sending message from %d  to %d '."\n".'Message: "%s"'."\n", $from->resourceId, $to->resourceId ,$message);


        } else if ($status=="accepted"){
            $to_send=[
                'text_message'=>Controller::robot($message),
                'from' => $from_token,
                'status'=>$status,
            ];
            $to->send(json_encode($to_send));
            echo sprintf('sending message from %d  to %d '."\n".'Message: "%s"'."\n", $from->resourceId, $to->resourceId ,$message);


        } else if ($status=="invite_accepted"){
            $to_send=[
                'text_message'=>Controller::robot($message),
                'from' => $from_token,
                'status'=>$status,
            ];
            $to->send(json_encode($to_send));
            echo sprintf('Invite accepted from %d  to %d '."\n".'Message: "%s"'."\n", $from->resourceId, $to->resourceId ,$message);


        }else{
            $to_send=[
                'text_message'=>Controller::robot($message),
                'status'=>$status,
                'from' => $from_token,
            ];
            $to->send(json_encode($to_send));
            echo sprintf('sending message from %d  to %d '."\n".'Message: "%s"'."\n"
                , $from->resourceId, $to->resourceId ,$message);
        }
    }
}
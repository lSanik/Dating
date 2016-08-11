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
        //\User->getUserIdSession(substr($cookies['user_key']),0,-3);
        $conn->resourceId=$user->getUserIdSession(substr($cookies['user_key'],0,-3));
        echo "new connection! User_id = {$conn->resourceId}"."\n";


        //$conn->WebSocket->request->getCookies();
    }
    public function onMessage(ConnectionInterface $from, $client_msg)
    {
        $client_msg=json_decode($client_msg,true);
        //var_dump($client_msg);


        echo sprintf('connection %d sending message "%s" other connection'."\n"
        , $from->resourceId, $client_msg['message']);

        $to_id=$client_msg['to_id'];
        $message=$client_msg['message'];
        // TODO: Im noob... Ned rewrite without foreach $this->clients[$to_id]->send($message);

        foreach ($this->clients as $client) {
            if($to_id == $client->resourceId){
                $client->send($message);
            }else{
                $from->send('Offline');
            }
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

}
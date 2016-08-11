<?php
/**
 * Created by PhpStorm.
 * User: Sanik
 * Date: 09.08.2016
 * Time: 15:35
 */
namespace App\Classes\Socket\Base;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class BaseSocket implements MessageComponentInterface
{
    public function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
    }
    public function onMessage(ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
    }
    public function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

}
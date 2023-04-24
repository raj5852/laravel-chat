<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class SocketController extends Controller implements MessageComponentInterface
{
    protected $clients;

    function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

     function  onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
    }

    function onMessage(ConnectionInterface $conn, $msg)
    {

    }
    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";
        $conn->close();
    }
}

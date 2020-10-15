<?php

namespace controller;

use dataManager\Db;

class Message
{

    public $id;
    public $sender_email;
    public $receiver_email;
    public $body;
    public $object;
    public $date;
    public $status;

    /**
     * Message constructor
     * @param $id                   id of the message
     * @param $sender_email         email of the sender
     * @param $receiver_email       email of the reciever
     * @param $body                 the content of the message
     * @param $object               Message subject
     * @param $date                 date of emission
     * @param $status
     */
    public function __construct($id, $sender_email, $receiver_email, $body, $object, $date, $status)
    {
        $this->id = $id;
        $this->sender_email = $sender_email;
        $this->receiver_email = $receiver_email;
        $this->body = $body;
        $this->object = $object;
        $this->date = $date;
        $this->status = $status;
    }

    /***
     * Function used to retrieve the current message sender
     * @return User|null
     */
    public function sender()
    {
        return User::lookForUser($this->sender_email);
    }

    /**
     * update the state of the message to seen
     */
    public function seen()
    {
        Db::Connection()->query('UPDATE message SET status = 1 WHERE id=' . $this->id);
    }


    /**
     * @param $id find a message by his id
     * @return Message|null
     */
    public static function lookForMessage($id)
    {
        $foundMsg = Db::seekMessage($id);
        if ($foundMsg)
            return new Message($foundMsg["id"], $foundMsg["sender_email"], $foundMsg["receiver_email"],
                $foundMsg["body"], $foundMsg["object"], $foundMsg["date"], $foundMsg["status"]);
        return null;
    }

}

<?php

namespace controller;

use dataManager\Db;

class User
{

    public $email;
    public $password;
    public $admin;
    public $active;

    /**
     * User constructor.
     * @param $email     user email
     * @param $password  user password
     * @param $admin     is admin
     * @param $active    is active
     */
    public function __construct($email, $password, $admin, $active)
    {
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
        $this->active = $active;
    }

    /**
     * The directory of all users
     * @return array
     */
    public static function directory()
    {
        $all = array();
        $data = Db::Connection()->query('SELECT * FROM user');

        while ($result = $data->fetch()) {
            $all[] = new User(
                $result["email"],
                $result["password"],
                $result["admin"],
                $result["active"]
            );
        }
        return $all;
    }

    /**
     * modify user info
     * @param $password
     * @param $admin
     * @param $active
     */
    public function modifyUser($password, $admin, $active)
    {

        Db::Connection()->query('UPDATE user SET 
                password="' . $password . '", 
                admin="' . $admin . '", 
                active="' . $active . '" 
                WHERE email="' . $this->email . '"'
        );
    }

    /**
     * The inbox
     * @return array
     */
    public function myMessages()
    {
        $foundMsg = Db::Connection()->query('SELECT * FROM message 
                                                WHERE receiver_email="' . $this->email . '" 
                                                ORDER BY date DESC');
        $messages = array();
        while ($tmp = $foundMsg->fetch())
            $messages[] = new Message(
                $tmp["id"],
                $tmp["sender_email"],
                $tmp["receiver_email"],
                $tmp["body"],
                $tmp["object"],
                $tmp["date"],
                $tmp["status"]
            );
        return $messages;
    }

    /**
     * @param $email
     * @return User|null
     */
    public static function lookForUser($email)
    {
        $foundUsr = Db::seekUser($email);
        if ($foundUsr)
            return new User(
                $foundUsr["email"],
                $foundUsr["password"],
                $foundUsr["admin"],
                $foundUsr["active"]
            );
        return null;
    }

    /**
     * the outbox
     * @return array
     */
    public function sentMessages()
    {
        $foundMsg = Db::Connection()->query('SELECT * FROM message 
                                            WHERE sender_email="' . $this->email . '" 
                                            ORDER BY date DESC');
        $messages = array();
        while ($tmp = $foundMsg->fetch())
            $messages[] = new Message(
                $tmp["id"],
                $tmp["sender_email"],
                $tmp["receiver_email"],
                $tmp["body"],
                $tmp["object"],
                $tmp["date"],
                $tmp["status"]
            );
        return $messages;
    }


}

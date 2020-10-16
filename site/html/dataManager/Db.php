<?php

namespace dataManager;

use PDO;
use PDOException;

class Db
{
    private static $pdo = null;

    /**
     * Make connection with the database
     * @return null
     */
    static function Connection()
    {
        if (Db::$pdo == null) {
            try {
                Db::$pdo = new PDO("sqlite:../databases/database.sqlite");
            } catch (PDOException $e) {
                exit;
            }
        }
        return Db::$pdo;

    }

    /**
     * Create new user
     * @param $email
     * @param $password
     * @param $admin
     */
    public static function addUser($email, $password, $admin)
    {
        Db::Connection()->query('INSERT INTO user (email, password, admin, active) VALUES '
            . '("' . $email . '","' . $password . '",' . $admin . ',1)');
    }

    /**
     * search for the user by his email address
     * @param $email
     * @return mixed
     */
    static function seekUser($email)
    {
        $response = Db::Connection()->query("SELECT * FROM user WHERE email ='" . $email . "'");
        return $response->fetch();
    }

    /**
     * Delete a user from the database by his email address
     * @param $email
     */
    static function deleteUser($email)
    {
        Db::Connection()->exec("DELETE FROM user WHERE email ='" . $email . "'");
    }


    /**
     * Add message to the data base
     * @param $sender_email
     * @param $receiver_email
     * @param $body
     * @param $object
     */

    static function addMessage($sender_email, $receiver_email, $body, $object)
    {
        $query = "INSERT INTO message (sender_email, receiver_email, body, object, date, status) VALUES "
            . '( "' . $sender_email . '","' . $receiver_email . '","' . $body . '","' . $object . '",datetime("now"),0)';
        echo DB::Connection()->exec($query);
    }

    /**
     * Search message in the database by the id
     * @param $id
     * @return mixed
     */
    static function seekMessage($id)
    {
        $response = Db::Connection()->query("SELECT * FROM message WHERE id=" . $id);
        return $response->fetch();
    }

    /**
     * Delete message from the database
     * @param $id
     */
    static function deleteMessage($id)
    {
        Db::Connection()->exec("DELETE FROM message WHERE id ='" . $id . "'");
    }

}

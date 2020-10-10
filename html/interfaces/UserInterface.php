<?php
namespace interfaces;
use interfaces\Utils;

class UserInterface
{

    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $status;
    public $admin;

 
    public function UserInterface($email,$first_name,$last_name, $password, $status,$admin)
    {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->status = $status;
        $this->admin = $admin;
    }

    public function modify($first_name,$last_name,$password,$status,$admin) {
        DataBaseObject::getDataBaseObject() -> query('UPDATE '."User".' SET '
            .Utils::$_FIRST_NAME.'="'.$first_name.'", '
            .Utils::$_LAST_NAME.'="'.$last_name.'", '
            .Utils::$_PASSWORD.'="'.$password.'",'
            .Utils::$_STATUS.'='.$status.', '
            .Utils::$_ADMIN.'='.$admin.
            ' WHERE '.Utils::$_EMAIL.'='.$this->email
        ) ;
    }

    public static function createUser($email,$first_name,$last_name,$password,$status,$admin) {
        DB::getDB()->query('INSERT INTO '."User".'('
        .Utils::$_EMAIL.','
        .Utils::$_FIRST_NAME.','
        .Utils::$_LAST_NAME.','
        .Utils::$_PASSWORD.','
        .Utils::$_STATUS.','
        .Utils::$_ADMIN.') VALUES '
            .'("'.$email.'","'.$first_name.'","'.$last_name.'","'.$password.'",'.$status.','.$admin.')'
        );
    }

    /**
     * get all recieved message for this user 
     */
    public function reception() {
        $resultat = DataBaseObject::getDataBaseObject()->query('SELECT * FROM '."Message".
        ' WHERE '.Utils::$_EMAIL_DESTINATAIRE.'='.$this->email.' ORDER BY '.Utils::$_DATE.' DESC');
        $messages = array();
        while ($result = $resultat->fetch())
            $messages[] = new Message(
                $result[Utils::$_ID],
                $result[Utils::$_EMAIL_EXPEDITEUR],
                $result[Utils::$_EMAIL_DESTINATAIRE],
                $result[Utils::$_OBJECT],
                $result[Utils::$_BODY],
                $result[Utils::$_DATE]
            );
        return $messages;
    }

    /**
     * get all sent messages for this user 
     */
    public function sent() {
        $resultat = DataBaseObject::getDataBaseObject()->query('SELECT * FROM '."Message".
        ' WHERE '.Utils::$_EMAIL_EXPEDITEUR.'='.$this->email.' ORDER BY '.Utils::$_DATE.' DESC');
        $messages = array();
        while ($result = $resultat->fetch())
            $messages[] = new Message(
                $result[Utils::$_ID],
                $result[Utils::$_EMAIL_EXPEDITEUR],
                $result[Utils::$_EMAIL_DESTINATAIRE],
                $result[Utils::$_OBJECT],
                $result[Utils::$_BODY],
                $result[Utils::$_DATE]
            );
        return $messages;
    }
/**
 * get a specific conversation with a user 
 */
    public function conversation($email) {

        $data =DataBaseObject::getDataBaseObject()->query('SELECT * FROM '."User".
        ' WHERE ('.Utils::$_EMAIL_EXPEDITEUR.'='.$email.' AND '.Utils::$_EMAIL_DESTINATAIRE.'='.$this->email.') 
          OR ('.Utils::$_EMAIL_EXPEDITEUR.'='.$this->email.' AND '.Utils::$_EMAIL_DESTINATAIRE.'='.$email.')
         ORDER BY '.Utils::$_DATE.' DESC' );
        $messages = array();
        while ($result =$data->fetch())
            $messages[] = new Message(
                $result[Utils::$_ID],
                $result[Utils::$_EMAIL_EXPEDITEUR],
                $result[Utils::$_EMAIL_DESTINATAIRE],
                $result[Utils::$_OBJECT],
                $result[Utils::$_BODY],
                $result[Utils::$_DATE]
            );
        return $messages;
    }
/**
 * search for a user 
 */
    public static function findUser($email) {
        $result = DataBaseObject::findOccurencend("User",$email);
        return $result?
            new UserInterface(
                $result[Utils::$_EMAIL],
                $result[Utils::$_FIRST_NAME],
                $result[Utils::$_LAST_NAME],
                $result[Utils::$_PASSWORD],
                $result[Utils::$_STATUS],
                $result[Utils::$_ADMIN]
            ):
            //no user found
            null;
    }

    /**
     * Directory contains all users
     */
    public static function usersDirectory() {
        $usersList = array();
        $response = DataBaseObject::getDataBaseObject()->query("SELECT * FROM "."User");
        while($result = $response->fetch()) {
            $usersList[] = new UserInterface(
                $result[Utils::$_EMAIL],
                $result[Utils::$_FIRST_NAME],
                $result[Utils::$_LAST_NAME],
                $result[Utils::$_PASSWORD],
                $result[Utils::$_STATUS],
                $result[Utils::$_ADMIN]
            );
        }
        return $usersList;
    }
/** 
    public static function lastId() {
        return DB::lastId(UserInterface::$TABLE);
    }

    public function isExpediteurOf(Message $message) {
        return $message->id_expediteur == $this->id;
    }

    public function isDestinataireOf(Message $message) {
        return $message->id_destinataire == $this->id;
    }

    public function desactiver() {
        $this->update($this->pseudo,$this->password,$this->type,UserInterface::$NON_ACTIF);
    }
    public function activer() {
        $this->update($this->pseudo,$this->password,$this->type,UserInterface::$ACTIF);
    }

    public function isAdministrator() {
        return $this == UserInterface::$ADMINISTRATOR;
    }

    public function isCollaborator() {
        return $this == UserInterface::$COLLABORATOR;
    }
    */

}

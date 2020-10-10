<?php
namespace interfaces;
use interfaces\Utils;

class MessageInterface
{
    public $id;
    public $email_expediteur;
    public $email_destinataire;
    public $object;
    public $body;
    public $date;

   /**constructor  */

    public function MessageInterface($id, $email_expediteur, $email_destinataire, $object, $body, $date)
    {
        $this->id = $id;
        $this->email_expediteur = $email_expediteur;
        $this->email_destinataire = $email_destinataire;
        $this->object = $object;
        $this->body = $body;
        $this->date = $date;
    }
    
    public static function findMessage($id) {
          $response = DataBaseObject::findOccurence("Message",$id);
        return $response?
            new MessageInterface(
                $response[Utils::$_ID],
                $response[Utils::$_EMAIL_EXPEDITEUR],
                $response[Utils::$_EMAIL_DESTINATAIRE],
                $response[Utils::$_OBJECT],
                $response[Utils::$_BODY],
                $response[Utils::$_DATE]
            ):
            null;
    }

    public function sender() {
        return UserInterface::findUser($this->email_expediteur);
    }

    public function reciever() {
        return UserInterface::findUser($this->email_destinataire);
    }

    public static function write($email_expediteur,$email_destinataire,$object,$body) {
        $query = 'INSERT INTO '.'Message'.'('.Utils::$_EMAIL_EXPEDITEUR.','.Utils::$_EMAIL_DESTINATAIRE.','
        .Utils::$_OBJECT.','.Utils::$_BODY.','.Utils::$_DATE.') VALUES '
        .'( '.$email_expediteur.','.$email_destinataire.',"'.$object.'","'.$body.'",datetime("now"))';
        DataBaseObject::getDataBaseObject()->query($query);
    }

    public function delete() {
        DataBaseObject::getDataBaseObject()->query('DELETE FROM '.'Message'.' WHERE '.Utils::$_ID.'='.$this->id);
    }


 


}

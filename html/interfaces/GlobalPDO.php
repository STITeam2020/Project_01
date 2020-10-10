<?php

namespace interfaces;

/*
    *This is the main object who have a connection with the database
    */
class DataBaseObject
{
    
    private static $_PDO = null;

    /**
     * returen the the PDO connection
     */
    static function getDataBaseObject() {
        assert(DataBaseObject::$_PDO==null);
     DataBaseObject::$_PDO = new PDO("sqlite:../databases/database.sql"); 
    return DataBaseObject::$_PD0;
    
    }
    /**
     * find a message or a usr by a key
     */
    static function findOccurence($table_name,$key) {
        $response = DataBaseObject::getDataBaseObject()->query("SELECT * FROM ".$table_name." WHERE id=".$key);
        return $response->fetch();
    }
}
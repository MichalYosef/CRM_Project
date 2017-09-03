<?php

class crmBLL{

    private $dbName;
    private $dbHandler;
    

    public function __construct( $dbName, $dbHandler )
    {
        $this->$dbName = $dbName;
        
        if( $dbHandler )
        {
            $this->$dbHandler = $dbHandler;
        }
        else
        {
            $this->$dbHandler = new Connection( $dbName );
        }
        
        
    }

    public function getAll( $tblName ) 
    {
        try
        {
            return  $dbHandler->getAll( $this-> $tblName );
        }
        catch( $e )
        {
            notify::Error( $e->getMessage() );

        }
        
    }

    public function insert( $tblName, $obj) 
    {
        /*
        INSERT INTO ls47_streets( name, c_id) VALUES( :name, :c_id)',
                               array( "name" => $this->name, 
                                      "c_id" => $this->c_id)
        */
        $keyStr = "(";
        $valueStr = " VALUES(";
        $arrayStr = "array(";

        foreach( $obj as $key => $value ) 
        {
            $keysStr .= $key . ", ";
            $valueStr .= ":" . $key . ",";
            $arrayStr .= " '" . $key . "' => " . $value . ",";
        }

        substr_replace( $keyStr, ")", strlen( $keyStr ) - 1 ,1 );
        substr_replace( $valueStr, ")", strlen( $valueStr ) - 1 ,1 );
        substr_replace( $arrayStr, ")", strlen( $arrayStr ) - 1 ,1 );
        

        $sqlQuery = "INSERT INTO " . $tblName . $keysStr . "," . $arrayStr ;

    }




}




?>
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
            $this->$dbHandler = new Connection("crm_project");
        }
        
        
    }

    static function getAll( $tblName )
    {
        try
        {
            return  $BLL->getAll( $this-> $tblName );
        }
        catch( $e )
        {
            notify::Error( $e->getMessage() );

        }
        
    }




}




?>
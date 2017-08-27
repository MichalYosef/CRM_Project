<?php

class baseCrmPerson implements IBaseCrmObj
{

    private $id;
    private $name;
    private $phone;
    private $tblName;
    private $BLL;

    public function __construct(    $tblName, 
                                    $name, 
                                    $phone,
                                    $BLL,
                                    $id=0 // in case we get it from the client
                                    )
    {
        $this-> $id = $id;
        $this-> $name = $name;
        $this-> $phone = $phone;
        $this-> $tblName = $tblName;
        $this-> $BLL = $BLL;
    }

    static function getAll() // TODO: remove from here Implement in every inheriting class
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
<?php

abstract class baseCrmPerson
{

    private $id;
    private $name;
    private $phone;
    private $tblName;
    private $BLL;

  
    abstract public function getSelfDataObj()
    {
        
    }


    public function create();
    public function update();
    public function select();
    public function delete();


    public function __construct(    $tblName, 
                                    $name, 
                                    $phone,
                                    $BLL,
                                    $id=0 // in case we get it from DB
                                    )
    {
        $this-> $id = $id;
        $this-> $name = $name;
        $this-> $phone = $phone;
        $this-> $tblName = $tblName;
        $this-> $BLL = $BLL;
    }

    static function getAll() 
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

    
    static function create() 
    {
        try
        {
            return  $BLL->insert( $this-> $tblName );
        }
        catch( $e )
        {
            notify::Error( $e->getMessage() );

        }    
    }




}




?>
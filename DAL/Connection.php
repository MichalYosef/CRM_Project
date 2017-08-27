<?php

class Connection{

    private $host;
    private $dbName;
    private $user;
    private $password;
    private $charset;
    private $opt; //A key=>value array of driver-specific connection options.
    private $dbConnection; //pdo
    private $dsn; /*The Data Source Name, or DSN, contains the information required to connect to the database.*/
     

    public function __construct( $dbName ,
                                 $user = 'root',
                                 $password = '',
                                 $host = '127.0.0.1',
                                 $charset = 'utf8',
                                 $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                         PDO::ATTR_EMULATE_PREPARES   => false]
                                )
    {
        $this->host    = $host;
        $this->dbName  = $dbName;
        $this->user    = $user;
        $this->password= $password;
        $this->charset = $charset;
        $this->opt     = $opt;
        
    
        $this->dsn = "mysql:host=" . $host . ";dbname=" . $dbName . ";charset=" . $charset;
        
        if(! $this->connect() ) // db doesnt exist
        {
            $this->createDb();
            
        }
        
       
    }

    private function createDb()
    {
        /*
            CREATE TABLE `crm_project`.`products` ( `id` INT NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(40) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
            ALTER TABLE `customers` ADD CONSTRAINT `forkey_cust_profession` FOREIGN KEY (`customer_profession_id`) REFERENCES `professions`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
            ALTER TABLE `customers` ADD CONSTRAINT `forkey_prosp_id` FOREIGN KEY (`prospect_id`) REFERENCES `prospects`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
            ALTER TABLE `prospects` ADD CONSTRAINT `forkey_lead_id` FOREIGN KEY (`lead_id`) REFERENCES `leads`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
            
            */

    }

    private function connect()
    {
        try{

            $this->dbConnection = new PDO( $this->dsn, $this->user, $this->password, $this->opt );
            

        }catch( PDOException $e) {

            Error::log( 'Connection failed:  exception was thrown: ' . $e->getMessage() );
        }
        
    }

    public function getDbConnection()
    {
        if( $this->dbConnection == null)
        {
            $this->connect();
        }

        return $this->dbConnection;
    }

    public function runSql( $sqlQuery, $arrParams=null )
    {
        try
        {
            $statement = $this->getDbConnection()->prepare( $sqlQuery )->execute($arrParams);
            
        }catch( PDOException $e) 
        {

            Error::log( 'pdo->prepare->execute failed:  exception was thrown: ' . $e->getMessage() );
        }
    
        return $statement;
    }



}




?>

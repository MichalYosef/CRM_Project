<?php

require_once 'Connection.php';

class crmBL{

    private $dbName;
    private $dbHandler;
    

    public function __construct( $dbName, $dbHandler = null )
    {
        $this->$dbName = $dbName;
        
        if( $dbHandler )
        {
            $this->$dbHandler = $dbHandler;
        }
        else
        {
            // TODO: get from DI Injector 
            $this->dbHandler = new Connection( $dbName );
        }
        
        
    }

    public function getAll( $tblName ) 
    {
        try
        {
            return $this->createObjArray( $dbHandler->getAll( $this->$tblName ), $tblName );
        }
        catch(PDOException  $e )
        {
            notify::Error( $e->getMessage() );

        }
        
    }

    public function insert( $tblName, $obj) 
    {
        $keyStr = "(";
        $valueStr = " VALUES(";
        
        foreach( $obj as $key => $value ) 
        {
            $keyStr .= $key . ", ";
            $valueStr .= "'" . $value . "',";    
        }

        $keyStr = rtrim($keyStr,", ") . ")" ;
        $valueStr = rtrim( $valueStr, ", ") . ")" ;
        

        $sqlQuery = "INSERT INTO " . $tblName . $keyStr . $valueStr .";";

        return $this->dbHandler->runQuery( $sqlQuery );
    }

    private function createObjArray( $statement, $tblName )
    {
         /*
         	while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		if($tableheader == false) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo "<th>{$key}</th>";
			}
			echo '</tr>';
			$tableheader = true;
		}
		echo "<tr>";
		foreach($row as $value) {
			echo "<td>{$value}</td>";
		}
		echo "</tr>";
         */
        while ($row = $statement->fetch())
        {
        
            /*
         	while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		if($tableheader == false) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo "<th>{$key}</th>";
			}
			echo '</tr>';
			$tableheader = true;
		}
		echo "<tr>";
		foreach($row as $value) {
			echo "<td>{$value}</td>";
		}
		echo "</tr>";
         */
        }
    }
}
?>
<?php
require_once 'crmBL.php';


$blObj = new crmBL("crm_project");

$leadObj = (object) array("lead_name" => "eli", 
                          "lead_phone" => "0202020454",
                          "product_id" => "2");
$res = $blObj->insert("leads", $leadObj);
                                  
echo $res;


?>
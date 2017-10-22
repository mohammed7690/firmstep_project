<?php
//    require ("Entities/firmstepCustomerEntities.php");
//    require $_SERVER['DOCUMENT_ROOT'].'/firmstep_project/Entities/firmstepCustomerEntities.php';
//    require $_SERVER['DOCUMENT_ROOT'].'/firmstep_project/Entities/firmstepServiceEntities.php';
    require $_SERVER['DOCUMENT_ROOT'].'/firmstep_project-master/Entities/firmstepCustomerEntities.php';
    require $_SERVER['DOCUMENT_ROOT'].'/firmstep_project-master/Entities/firmstepServiceEntities.php';
    class FirmstepModel {
        function getData(){
            require ("Credentials.php");
            //open database connection
            mysql_connect($host, $user, $passwd) or die(mysql_error());
            mysql_select_db($database);
            $result = mysql_query("SELECT * FROM firmstep_customer") or die(mysql_error());
            $dataArray = array();

            //get the data from the database
            while ($row = mysql_fetch_array($result)) {
                $id = $row[0];
                $type = $row[1];
                $name = $row[2];
                $service = $row[3];
                $queued_at = $row[4];

                //create an customer object and store them in an array to view. 
                $dataObj = new firmstepCustomerEntities($id, $type, $name, $service, $queued_at);
                array_push($dataArray, $dataObj);
            }

            //Close connection and return result.
            mysql_close();
            return $dataArray;
        }
        
        function getServiceData(){
            require ("Credentials.php");
            //open database connection
            mysql_connect($host, $user, $passwd) or die(mysql_error());
            mysql_select_db($database);
            $result = mysql_query("SELECT * FROM firmstep_services") or die(mysql_error());
            
            $dataArray = array();
            //get data from database
            while($row = mysql_fetch_array($result))
            {
                $id = $row[0];
                $service = $row[1];
                
                $dataObj = new firmstepServiceEntities($id, $service);
                array_push($dataArray, $dataObj);
            }
            
            mysql_close();
            return $dataArray;
        }
        
        function getCurrentId(){
            require ("Credentials.php");
            //open database connection
            mysql_connect($host, $user, $passwd) or die(mysql_error());
            mysql_select_db($database);
            $result = mysql_query("SHOW TABLE STATUS LIKE 'firmstep_customer'") or die(mysql_error());
            $data = mysql_fetch_array($result)['Auto_increment'];
            mysql_close();
            return $data;
        }
        
        function InsertGoods(firmstepCustomerEntities $customer){
            $query = sprintf("INSERT INTO firmstep_customer
                            (type, name, service, queued_at)
                            VALUES
                            ('%s', '%s', '%s', '%s')",
            //"mysql_real_escape_string" this escapes special characters in the sql statements 
                            mysql_real_escape_string($customer->type),
                            mysql_real_escape_string($customer->name),
                            mysql_real_escape_string($customer->service),
                            mysql_real_escape_string($customer->queued_at));
            $this->PerformQuery($query);
	   }
        
        function PerformQuery($query){
            //open connection and select database
            require 'Credentials.php';
            mysql_connect($host, $user) or die(mysql_error());
            mysql_select_db($database);
            
            //execute query and close connection
            mysql_query($query) or die(mysql_error());
            mysql_close();
        }
    }
?>
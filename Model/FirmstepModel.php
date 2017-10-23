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
            $connection = mysqli_connect($host, $user, $passwd, $database);
//            mysql_connect($host, $user, $passwd) or die(mysql_error());
            
            //mysql_select_db($database);
//            $result = mysql_query("SELECT * FROM firmstep_customer") or die(mysql_error());
            $result = mysqli_query($connection, "SELECT * FROM firmstep_customer");
            $dataArray = array();

            //get the data from the database
            while ($row = mysqli_fetch_array($result)) {
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
//            mysql_close();
            mysqli_close($connection);
            return $dataArray;
        }
        
        function getServiceData(){
            require ("Credentials.php");
            //open database connection
            $connection = mysqli_connect($host, $user, $passwd, $database);
            
            $result = mysqli_query($connection, "SELECT * FROM firmstep_services");
            
            $dataArray = array();
            //get data from database
            while($row = mysqli_fetch_array($result))
            {
                $id = $row[0];
                $service = $row[1];
                
                $dataObj = new firmstepServiceEntities($id, $service);
                array_push($dataArray, $dataObj);
            }
            
            mysqli_close($connection);
            return $dataArray;
        }
        
        function getCurrentId(){
            require ("Credentials.php");
            //open database connection
            $connection = mysqli_connect($host, $user, $passwd, $database);
            
            $result = mysqli_query($connection, "SHOW TABLE STATUS LIKE 'firmstep_customer'");
            
            $data = mysqli_fetch_array($result)['Auto_increment'];
            
            mysqli_close($connection);
            return $data;
        }
        
        function InsertGoods(firmstepCustomerEntities $customer){
            require 'Credentials.php';
            $connection = mysqli_connect($host, $user, $passwd, $database);
            
            $query = sprintf("INSERT INTO firmstep_customer
                            (type, name, service, queued_at)
                            VALUES
                            ('%s', '%s', '%s', '%s')",
            //"mysql_real_escape_string" this escapes special characters in the sql statements 
                            mysqli_real_escape_string($connection, $customer->type),
                            mysqli_real_escape_string($connection, $customer->name),
                            mysqli_real_escape_string($connection, $customer->service),
                            mysqli_real_escape_string($connection, $customer->queued_at));
            mysqli_query($connection, $query);
            mysqli_close($connection);
	   }
        
        function PerformQuery($query){
            //open connection and select database
            require 'Credentials.php';
            $connection = mysqli_connect($host, $user, $passwd, $database);
            
            //execute query and close connection
            mysqli_query($connection, $query);
            mysqli_close($connection);
        }
    }
?>

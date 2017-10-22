<?php
//    require("Model/FirmstepModel.php");
    //changed to absolute path due to some problems from javascript ajax calls
//    require $_SERVER['DOCUMENT_ROOT'].''.dirname($_SERVER['PHP_SELF']).'/Model/FirmstepModel.php';
    require $_SERVER['DOCUMENT_ROOT'].'/firmstep_project-master/Model/FirmstepModel.php';
    class FirmstepController {
		function getDetails() {
            $firmStepModel = new FirmstepModel();
            $data =  $firmStepModel->getData();
            if(!empty($data)){
                for($i = 0; $i < count($data); $i++){
                    $array = (array) $data[$i];
                    echo('<div class="items clearfix">');
                        foreach($array as $key => $val){
                            if($key == 'id'){
                                echo('<div class="inner-items num">'.$val.'</div>');
                            }else {
                                echo('<div class="inner-items">'.$val.'</div>');
                            }
                        }
                    echo('</div>');
                }
            }else {
                echo('<div class="empty-database">Database is empty, use the form to add a customer</div>');
            }
        }
    }
    //this fills up the service 
    if (isset($_POST['notifyVal'])) {
        $firmStepModel = new FirmstepModel();
        echo(json_encode($firmStepModel->getServiceData()));
    }

    // this checks prevents the error when loading the page
    if (isset($_POST['firstname'])) {
        $firmStepModel = new FirmstepModel();
        $id =  $firmStepModel->getCurrentId();
        
        $identity = $_POST['identity'];
        
        $title = $_POST['title'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        
        $name = "$title $firstname $surname";
        $service = $_POST['service'];
        date_default_timezone_set('Europe/London');
        $time = date("h:i");
        
        //echo "$id $identity $title $firstname $surname $service $time";
        echo "<div class='inner-items num'>$id</div>";
        echo "<div class='inner-items'>$identity</div>";
        echo "<div class='inner-items'>$name</div>";
        echo "<div class='inner-items'>$service</div>";
        echo "<div class='inner-items'>$time</div>";
        
        // "-1" used for dummy data or faulty data
		$customer = new firmstepCustomerEntities(-1, $identity, $name, $service, $time);
		$firmStepModel->InsertGoods($customer);
    }
    
?>

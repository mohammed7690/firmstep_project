<?php
    require 'Controller/FirmstepController.php';
	$firmstepController = new FirmstepController();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="app-title">Queue App</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="outer-border">
                   <div class="header-text">New Customer</div>    
                    <div class="form citizenData">
                        <div class="form-row">
                            <div class="form-group servicesParent col-md-12">
                                <label for="services" class="col-form-label">Services</label>
                                <div id="services" class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                    <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radioStacked3" name="radio-stacked" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radioStacked4" name="radio-stacked" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radioStacked5" name="radio-stacked" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"></span>
                                </label>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group identity" data-toggle="buttons">
                            <div id="citizen" class="identity-buttons active">
                                <span>Citizen</span>
                            </div>
                            <div id="organisation" class="identity-buttons">
                                <span>Organisation</span>
                            </div>
                            <div id="anonymous" class="identity-buttons">
                                <span>Anonymous</span>
                            </div>
                        </div>

                        <div class="form-row custom-style titleDiv">
                        <label for="nameTitle" class="col-form-label">Title</label>
                        <select class="custom-select form-control" id="nameTitle">
                            <option selected>Mr.</option>
                            <option>Mrs.</option>
                            <option>Miss</option>
                            <option>Dr.</option>
                        </select>
                        </div>
                        <div class="form-group firstnameDiv">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="First name" value="" required>
                        </div>
                        <div class="form-group surnameDiv">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Last name" value="" required>
                        </div>
                        <div class="validation-wrapper">
                            <div class="validation firstname-validation text-danger hideContent">Please fill in your first name.</div>
                            <div class="validation surname-validation text-danger hideContent">Please fill in your last name.</div>
                        </div>
                        <button type="submit" id="form-submit" class="btn btn-primary">Submit</button>
                    </div> <!-- end of form -->
                </div>
            </div> <!-- end of col-md-6 -->
            <div class="col-lg-6">
                <div class="results outer-border">
                   <div class="header-text">Queue</div>
                    <div class="item-top-text">List of the customers being queued</div>
                    <div class="items item-header clearfix">
                        <div class="inner-items num">#</div>
                        <div class="inner-items">Type</div>
                        <div class="inner-items">Name</div>
                        <div class="inner-items">Services</div>
                        <div class="inner-items">Queued at</div>
                    </div>
                    <?php $firmstepController->getDetails(); ?>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
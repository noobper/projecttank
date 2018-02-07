<?php require_once('/connect/funtion.php'); ?>
<link href="css/bootstrap.min.css" rel="stylesheet">

<div class="container">
<form id="identicalForm" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">Password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Retype password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="confirmPassword" />
        </div>
    </div>
</form>
</div>

<script src="js/vendor/jquery.min.js"></script> 
<script src="js/bootstrap.js"></script>
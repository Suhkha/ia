<?php 
include 'persistent-options.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>IA Interactive - Web System</title>
    <?php styles('../'); ?>
    
</head>
<body>

<?php menu(''); ?>

<div class="container">
    <h1>Sistema web IA Interactive</h1>
    
    <?php include('blocks/__block--alerts.php'); ?>
    
    <div class="m-top panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Ingresar al sistema.</h3>
      </div>
      <div class="panel-body">
        <form action="login.php" method="post" id="login-form">
                <div class="form-group">
                    <div class="col-lg-12">
                      <label class="control-label">Email</label>
                      <input name="email" class="form-control" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                      <label class="control-label">Contraseña</label>
                      <input name="password" class="form-control" type="password">
                    </div>
                </div>
                <div class="form-group">
                      <div class="col-lg-12">
                      <label class="control-label"></label>
                        <button type="submit" class="btn m-top right btn-primary">Ingresar</button>
                      </div>
                </div>
            </form>
      </div>
    </div>

</div>
<?php script('../'); ?>

</body>
</html>

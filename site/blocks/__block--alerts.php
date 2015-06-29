<!--Custom alerts for users-->
<?php if($_GET['status'] == "error"){ ?>
  <div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Error!</strong> Algo inesperado ha sucedido. Intente nuevamente.
  </div>   
<?php } ?>
<?php if($_GET['status'] == "error_envio"){ ?>
  <div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Error!</strong> No se ha mandado el email. Aún así sus datos han sido registrados.
  </div>   
<?php } ?>
<?php if($_GET['status'] == "email_exists"){ ?>
  <div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Error!</strong> El email que intenta registrar ya está en uso. Intente con otro.
  </div>   
<?php } ?>

<?php if($_GET['status'] == "warning"){ ?>
  <div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Revisa!</strong> El password solo admite números y letras en mayúsculas y minúsculas y puntos.
  </div>   
<?php } ?>

<?php if($_GET['status'] == "denied"){ ?>
  <div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Sesión no iniciada!</strong> Intente nuevamente.
  </div>   
<?php } ?>

<?php if($_GET['status'] == "ok"){ ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Correcto!</strong> La información ha sido procesada correctamente.
  </div>
<?php } ?>

<?php if($_GET['status'] == "updated"){ ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Correcto!</strong> La información se ha actualizado correctamente.
  </div>
<?php } ?>

<?php if($_GET['status'] == "deleted"){ ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Correcto!</strong> La información se ha eliminado correctamente.
  </div>
<?php } ?>

<?php if($_GET['status'] == "out"){ ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>¡Correcto!</strong> Ha salido del sistema correctamente.
  </div>
<?php } ?>
<!--End custom alerts for users-->
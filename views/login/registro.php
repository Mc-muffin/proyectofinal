<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./style.css">
  <title>Formulario Registro</title>
</head>
<?php include_once "../../cfg/config.php"; ?>

<script>
  var Globals = <?php echo json_encode(
    array(
      'BASE_URL' => BASE_URL
    )
  ); ?>;
</script>

<section class="form-register">
  <h4>Formulario Registro</h4>
  <form name="LMAO" id="formulario" method="POST">
    <label class="form-group">Nombres:</label>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
    <label class="form-group">Apellidos:</label>
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
    <label class="form-group">Usuario:</label>
    <input class="controls" type="text" name="usuario" id="usuario" placeholder="Ingresar usuario">
    <label class="form-group">Contraseña:</label>
    <input class="controls" type="password" name="contraseña" id="password" placeholder="Ingresar contraseña">
    <label class="form-group">Tipo de usuario:</label>
    <select class="controls" id="tipo_id" name="select" placeholder="Seleccione...">
      <option value="" selected disabled hidden>Seleccione...</option>
      <option class="controls" value="0">Usuario Normal</option>
      <option class="controls" value="1">Administrador</option>
    </select>
    <!-- <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p> -->
    <input type="submit" class="botons" name="register" id="guardar" value="Registrar">
  </form>
  <a class="botons narrow red" href="<?php print BASE_URL; ?>/index.php">Regresar</a>
  <p><a href="#">¿Ya tiene Cuenta?</a></p>
</section>
<!-- 
<form name="formulario" id="formulario" method="POST">
  <div class="container p-4">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card card-body">
          <div class="form-group">
            <label class="form-group">Username</label>
            <input type="text" id="txtUsername" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="form-group">Contraseña</label>
            <input type="password" id="txtContraseña" name="passwordd" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="form-group">Nombre</label>
            <input type="text" id="txtNombre" name="nombres" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="form-group">Apellido</label>
            <input type="text" id="txtApellidos" name="apellidos" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="form-group">Tipo de Usuario</label>
            <input type="number" id="txtTipo_id" name="tipo_id" class="form-control" required>
          </div>

          <div class="form-group">
            <a href="<?php print BASE_URL; ?>/indexlg.php">Regresar</a>
          </div>

          <input type="submit" name="register" id="guardar" class="btn btn-success btn-block" value="guardar">
        </div>
      </div>
    </div>
  </div>
</form> -->
<?php include "footer.php"; ?>

<script src="../template/js/guardar_usuario.js"></script>
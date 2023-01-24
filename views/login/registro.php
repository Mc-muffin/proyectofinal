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
    <input class="controls" type="text" name="username" id="usuario" placeholder="Ingresar usuario">
    <label class="form-group">Contraseña:</label>
    <input class="controls" type="password" name="password" id="password" placeholder="Ingresar contraseña">
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
<?php include "footer.php"; ?>

<script src="../template/js/registerUser.js"></script>
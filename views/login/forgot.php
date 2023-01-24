<!DOCTYPE html>
<?php include_once "../../cfg/config.php"; ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contraseña olvidada</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
  <section class="form-register">
    <form action="" method="POST">
      <label class="form-group">Usuario</label>
      <input class="controls" type="username" name="username" placeholder="Ingresar usuario">
      <input class="botons" type="submit" name="register" value="Enviar">
      <a class="botons narrow red" href="<?php print BASE_URL; ?>/index.php">Regresar</a>
    </form>
  </section>
</body>

</html>
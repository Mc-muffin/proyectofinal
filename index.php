<!DOCTYPE html>
<html lang="en">
<?php include_once "./cfg/config.php"; ?>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
  <section class="form-register">
    <form action="" method="POST">
      <h4>Login</h4>
      <label class="form-group">Username</label>
      <input class="controls" type="text" name="username" class="form-control">
      <label class="form-group">Contraseña</label>
      <input class="controls" type="password" name="contraseña" class="form-control">
      <p>¿Aún no tienes una cuenta? <a href="views/login/registro.php">Regístrate aquí</a></p>

      <input type="submit" name="register" class="botons" value="Ingresar">
      <!-- <a href="views/login/forgot.php">¿Olvidó la contraseña?</a> -->
    </form>
  </section>
</body>

</html>
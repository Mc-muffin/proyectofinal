<?php  require_once("../template/header.php") ?>
<main class="container">

        <h1 class="text-center">Crear Actas</h1>
        <a href="list_actas.php">Actas</a>
       <br>
       <br>

       <form class="row g-3">
       <div class="col-md-2">
    <label for="inputId_creador" class="form-label">Id_creador</label>
    <input type="num" class="form-control" id="inputId_creador" placeholder="Id_creador">
  </div>

  <div class="col-md-6">
    <label for="inputAsunto" class="form-label">Asunto</label>
    <input type="text" class="form-control" id="inputAsunto" placeholder="Asunto">
  </div>

  <div class="col-md-6">
    <label for="inputFecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="inputFecha">
  </div>
  <div class="col-md-2">
    <label for="inputHora_inicio" class="form-label">Hora_inicio</label>
    <input type="time" class="form-control" id="inputHora_inicio" placeholder="Hora_inicio">
  </div>
  <div class="col-md-2">
    <label for="inputHora_finalizacion" class="form-label">Hora_finalizacion</label>
    <input type="time" class="form-control" id="inputHora_finalizacion" placeholder="Hora_finalizacion">
  </div>
  <div class="col-12">
    <label for="inputResponsable_Id" class="form-label">Responsable_Id</label>
    <input type="num" class="form-control" id="inputResponsable_Id" placeholder="Responsable_Id">
  </div>
  <div class="col-8">
    <label for="inputOrden del dia" class="form-label">Orden del dia</label>
    <input type="text" class="form-control" id="inputOrden del dia" placeholder="Orden del dia">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Descripcion</label>
</div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
         
  
  </main>
  <?php include('../template/footer.php'); ?>
     <script src="../template/js/guardar_credito.js"></script>
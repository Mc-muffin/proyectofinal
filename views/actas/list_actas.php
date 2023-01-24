<?php  require_once("../template/header.php") ?>


<main class="container">

        <h1 class="text-center">Lista de actas</h1>
        <a href="Crear_actas.php" class="btn btn-success"> <i class="fas fa-plus-circle"></i>Crear acta</a>
       

        <table id="tblclientes"class="table">
  <thead>
    <tr>
      <th scope="col">Id_acta</th>
      <th scope="col">Id_creador</th>
      <th scope="col">Asunto</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora_inicio</th>
      <th scope="col">Hora_finalizacion</th>
      <th scope="col">Responsable_id</th>
      <th scope="col">Orden del dia</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Opciones</th>
    
        <td>
        <a href="<?=BASE_URL?>views/cliente/editar_credito.php?p=1"class="btn btn-outline-primary btn-sm" title="Editar registro" ><i class="fas fa-user-edit"> </i></a>
        <button class="btn btn-outline-danger btn-sm" title="eliminar registro" onclick="fntDelcliente(1)"><i class="fas fa-trash-alt"></i></button>
    </td>
    </tr>
  </thead>
  <tbody id="tblBodyClientes">
           
  </tbody>
</table>
    
 
     <?php  require_once("../template/footer.php") ?>

     <script src="../template/js/function_cliente.js"></script>
<?php
header('Content-Type: application/json');
require_once("../lib/conexion.php");
require_once("../lib/utils.php");
require_once("../models/Credito.php");

$credito = new Asistente();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {

    case "create":

        if (empty($body)) {

            echo json_encode("DEBES RELLENAR TODOS LOS CAMPOS");

        } elseif
        (
            is_numeric($body["Id_cliente"]) &&
            is_numeric($body["Monto"]) &&
            is_string($body["Entidad"]) &&
            $credito->validatemesdia($body["dia"],
                $body["mes"]) == true &&
            is_string($body["Modalidad"]) &&
            is_string($body["Estado"])
        ) {



            $datos = $credito->create(
                $body["Id_cliente"],
                $body["Monto"],
                $body["Entidad"],
                $body["mes"], $body["dia"], $body["año"],
                $body["Modalidad"],
                $body["Estado"]
            );

            echo json_encode("CREDITO CREADO CON EXITO");
            echo json_encode($datos);

        } elseif (!is_numeric($body["Id_cliente"])) {
            echo json_encode("EL ID DEBE SER NUMERICO");
        } elseif (!is_numeric($body["Monto"])) {
            echo json_encode("EL CAMPO MONTO DEBE SER NUMERICO");
        } elseif (!is_string($body["Entidad"])) {
            echo json_encode("EL CAMPO DEBE SER ALFABETICO");
        } elseif ($credito->validatemesdia($body["dia"], $body["mes"]) == false) {
            echo json_encode("LA FECHA DEBE ESTAR EN EL FORMATO DD/MM/AA");
        } elseif (!checkdate($body["mes"], $body["dia"], $body["año"])) {
            echo json_encode("LA FECHA DEBE ESTAR EN EL FORMATO dd/mm/aa");
        } elseif (!is_string($body["Modalidad"])) {
            echo json_encode("EL CAMPO MODALIDAD DEBE SER ALFABETICO");
        } elseif (!is_string($body["Estado"])) {
            echo json_encode("EL CAMPO ESTADO DEBE SER ALFABETICO");
        }

        break;

    case "Read":
        $datos = $credito->readAll();
        echo json_encode($datos);
        break;

    case "Read_Id":
        $datos = $credito->readById($body["Id_credito"]);
        echo json_encode($datos);
        break;

    case "Update":
        $datos = $credito->update(
            $body["Id_credito"],
            $body["Monto"],
            $body["Entidad"],
            $body["Fecha_inicial"],
            $body["Modalidad"],
            $body["Estado"]
        );
        echo json_encode("Update Correcto");
        echo json_encode($datos);
        break;

    case "Delete":
        $datos = $credito->delete($body["Id_credito"]);
        echo json_encode("Delete Correcto");
        echo json_encode($datos);
        break;


    case "Reporte":
        $datos = $credito->report_credito($body["Fecha_i"], $body["Fecha_f"]);
        echo json_encode($datos);
        break;





}
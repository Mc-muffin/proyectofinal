<?php
header('Content-Type: application/json');
require_once("../lib/conexion.php");
require_once("../lib/utils.php");
require_once("../models/acta.php");

$acta = new Acta();

$id             = getPostWithDefault("id");
$creador_id     = getPostWithDefault("creador_id");
$asunto         = getPostWithDefault("asunto");
$fecha_creacion = getPostWithDefault("fecha_creacion");
$hora_inicio    = getPostWithDefault("hora_inicio");
$hora_final     = getPostWithDefault("hora_final");
$resp_id        = getPostWithDefault("responsable_id");
$orden_dia      = getPostWithDefault("orden_del_dia");
$desc_hechos    = getPostWithDefault("descripcion_hechos");

switch ($_REQUEST["op"]) {
    case "create":
        $erros = doValidate();

        if (count($errors) != 0){
            $data = $acta->create(
                $creador_id,
                $asunto,
                $fecha_creacion,
                $hora_inicio,
                $hora_final,
                $resp_id,
                $orden_dia,
                $desc_hechos
            );
            
            # TO-DO validate insertion
            echo json_encode(array(
                "result"  => "OK",
                "message" => "Acta creada con éxito",
                "data"    => $data,
                "errors"  => $errors
            ));

            return;
        } else {
            echo json_encode(array(
                "result"  => "FAIL",
                "message" => "Errores en datos de entrada",
                "data"    => array(),
                "errors"  => $errors
            ));
        }

        break;


    case "read":
        $datos = $acta->readAll();
        echo json_encode($datos);
        break;

    case "readId":
        $datos = $acta->readById($id);
        echo json_encode($datos);
        break;

    case "update":
        $erros = doValidate();

        if (count($errors) != 0){
            $data = $acta->update(
                $id,
                $creador_id,
                $asunto,
                $fecha_creacion,
                $hora_inicio,
                $hora_final,
                $resp_id,
                $orden_dia,
                $desc_hechos
            );
            
            # TO-DO validate Update
            echo json_encode(array(
                "result"  => "OK",
                "message" => "Acta actualizada con éxito",
                "data"    => $data,
                "errors"  => $errors
            ));

            return;
        } else {
            echo json_encode(array(
                "result"  => "FAIL",
                "message" => "Errores en datos de entrada",
                "data"    => array(),
                "errors"  => $errors
            ));
        }

        break;

    case "delete":
        $datos = $acta->delete($id);
        echo json_encode(array(
            "result"  => "OK",
            "message" => "Acta borrada con éxito",
            "data"    => $datos,
            "errors"  => $errors
        ));
        break;
    
    default:
        # Unkown operation, so FORBIDEN
        http_response_code(403);
        break;

}

function doValidate(){
    global $id, $creador_id, $asunto, $fecha_creacion, $hora_inicio, 
    $hora_final, $resp_id, $orden_dia, $desc_hechos;

    # TO-DO actually validate input dates

    $errors = array();
    if (!is_numeric($creador_id)) {
        $errors[] = "CREADOR NO VÁLIDO";
    } 
    if (!is_string($asunto)) {
        $errors[] = "EL CAMPO ASUNTO DEBE SER ALFABÉTICO";
    } 
    if (!is_string($fecha_creacion)) {
        $errors[] = "FECHA DE CREACIÓN INVÁLIDA";
    } 
    if (!is_string($hora_inicio)) {
        $errors[] = "HORA INICIO INVÁLIDA";
    } 
    if (!is_string($hora_final)) {
        $errors[] = "HORA FINAL INVÁLIDA";
    } 
    if (!is_numeric($resp_id)) {
        $errors[] = "RESPONSABLE ID DEBE SER NUMÉRICO";
    } 
    if (!is_string($orden_dia)) {
        $errors[] = "ORDEN DEL DÍA DEBE SER STRING";
    } 
    if (!is_string($desc_hechos)) {
        $errors[] = "DESCRIPCIÓN HECHOS DEBE SER STRING";
    }
    return $errors;
}
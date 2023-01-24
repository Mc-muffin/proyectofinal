<?php
header('Content-Type: application/json');

require_once("../libs/conexion.php");
require_once("../libs/utils.php");
require_once("../models/usuario.php");
$usuario = new Usuario();

$id = getPostWithDefault("id");
$username = getPostWithDefault("username");
$password = getPostWithDefault("password");
$nombres = getPostWithDefault("nombres");
$apellidos = getPostWithDefault("apellidos");
$tipo_id = getPostWithDefault("tipo_id");

switch ($_REQUEST["op"]) {

    case "create":
        $erros = doValidate();

        if (count($errors) != 0) {
            $data = $usuario->create(
                $username,
                $password,
                $nombres,
                $apellidos,
                $tipo_id
            );

            # TO-DO validate insertion
            echo json_encode(
                array(
                    "result" => "OK",
                    "message" => "Usuario creado con éxito",
                    "data" => $data,
                    "errors" => $errors
                )
            );

            return;
        } else {
            echo json_encode(
                array(
                    "result" => "FAIL",
                    "message" => "Errores en datos de entrada",
                    "data" => array(),
                    "errors" => $errors
                )
            );
        }

        break;

    case "read":
        $datos = $usuario->readAll();
        echo json_encode($datos);
        break;

    case "readId":
        $datos = $usuario->readById($id);
        echo json_encode($datos);
        break;

    case "update":
        $datos = $usuario->update(
            $id,
            $username,
            $password,
            $nombres,
            $apellidos,
            $tipo_id
        );
        echo json_encode(
            array(
                "result" => "OK",
                "message" => "Usuario actualizado con éxito",
                "data" => $datos,
                "errors" => $errors
            )
        );
        break;

    case "delete":
        $datos = $usuario->delete($id);
        echo json_encode(
            array(
                "result" => "OK",
                "message" => "Usuario borrado con éxito",
                "data" => $datos,
                "errors" => $errors
            )
        );
        break;
    default:
        # Unkown operation, so FORBIDEN
        http_response_code(403);
        break;
}


function doValidate()
{
    global $id, $username, $password, $nombres, $apellidos, $tipo_id;

    $errors = array();
    if (!is_string($username)) {
        $errors[] = "NOMBRE DE USUARIO DEBE SER ALFABÉTICO";
    }
    if (!is_string($password)) {
        $errors[] = "CONTRASEÑA INVÁLIDA"; # TO-DO check passwords
    }
    if (!is_string($nombres)) {
        $errors[] = "NOMBRES DEBE SER ALFABÉTICO";
    }
    if (!is_string($apellidos)) {
        $errors[] = "APELLIDOS DEBE SER ALFABÉTICO";
    }
    if (!is_numeric($tipo_id)) {
        $errors[] = "TIPO ID DEBE SER NUMÉRICO";
    }
    return $errors;
}
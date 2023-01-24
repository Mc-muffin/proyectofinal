<?php
class usuario extends DB
{
    public function create($username, $password, $nombres, $apellidos, $tipo)
    {
        $conectar = parent::getInstance();
        parent::setCharsetEncoding();
        $sql = "INSERT INTO usuarios(
            id, 
            username, 
            password,
            nombres, 
            apellidos, 
            tipo_id) VALUES (NULL,?,?,?,?,?)";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $username);
        $sql->bindValue(2, $password);
        $sql->bindValue(3, $nombres);
        $sql->bindValue(4, $apellidos);
        $sql->bindValue(5, $tipo);
        $sql->execute();
        $id = $conectar->lastInsertId();
        $resultado = array(
            "id"        => $id,
            "username"  => $username,
            "password"  => $password,
            "nombres"   => $nombres,
            "apellidos" => $apellidos,
            "tipo"      => $tipo
        );
        return $resultado;
    }
    
    public function readAll()
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM usuarios";
        $qry = $inst->prepare($qry);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM usuarios WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $password, $nombres, $apellidos, $tipo)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM usuarios WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "UPDATE usuarios SET
                username = ?,
                password = ?,
                nombres = ?,
                apellidos = ?,
                tipo?id = ?
                WHERE
                id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $username);
        $qry->bindValue(2, $password);
        $qry->bindValue(3, $nombres);
        $qry->bindValue(5, $apellidos);
        $qry->bindValue(6, $tipo);
        $qry->bindValue(7, $id);

        $qry->execute();
        return $resultado;
    }

    public function delete($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM usuarios WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "DELETE FROM usuarios WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $resultado;
    }
}
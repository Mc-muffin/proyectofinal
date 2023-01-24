<?php
class compromiso extends DB
{
    public function create($acta_id, $responsable_id, $descripcion, $fecha_inicio, $fecha_final)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "INSERT INTO compromisos(
            id,
            acta_id,
            responsable_id,
            descripcion,
            fecha_inicio, 
            fecha_final) VALUES (NULL,?,?,?,?,?,?);";

        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $acta_id);
        $qry->bindValue(2, $responsable_id);
        $qry->bindValue(3, $descripcion);
        $qry->bindValue(4, $fecha_inicio);
        $qry->bindValue(5, $fecha_final);
        $qry->execute();
        $id = $inst->lastInsertId();
        $resultado = array(
            "id"             => $id,
            "acta_id"        => $acta_id,
            "responsable_id" => $responsable_id,
            "descripcion"    => $descripcion,
            "fecha_inicio"   => $fecha_inicio,
            "fecha_final"    => $fecha_final
        );
        return $resultado;
    }

    public function readAll()
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM compromisos";
        $qry = $inst->prepare($qry);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM compromisos WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $acta_id, $responsable_id, $descripcion, $fecha_inicio, $fecha_final)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM compromisos WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "UPDATE compromisos SET
                acta_id = ?,
                responsable_id = ?,
                descripcion = ?,
                fecha_inicio = ?,
                fecha_final = ?
                WHERE
                id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $acta_id);
        $qry->bindValue(2, $responsable_id);
        $qry->bindValue(3, $descripcion);
        $qry->bindValue(5, $fecha_inicio);
        $qry->bindValue(6, $fecha_final);
        $qry->bindValue(7, $id);

        $qry->execute();
        return $resultado;
    }

    public function delete($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM compromisos WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "DELETE FROM compromisos WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $resultado;
    }
}
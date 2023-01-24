<?php
class Asistente extends DB
{
    public function create($acta_id, $asistente_id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "INSERT INTO asistentes(
            id,
            acta_id
            asistente_id) VALUES (NULL,?,?);";

        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $acta_id);
        $qry->bindValue(2, $asistente_id);
        $qry->execute();
        $id = $inst->lastInsertId();
        $resultado = array(
            "id" => $id,
            "acta_id" => $acta_id,
            "asistente_id" => $asistente_id
        );
        return $resultado;
    }

    public function readAll()
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM asistentes";
        $qry = $inst->prepare($qry);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM asistentes WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $acta_id, $asistente_id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM asistentes WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "UPDATE asistentes SET
                acta_id = ?,
                asistente_id = ?
                WHERE
                id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $acta_id);
        $qry->bindValue(2, $asistente_id);
        $qry->bindValue(3, $id);

        $qry->execute();
        return $resultado;


    }

    public function delete($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "SELECT * FROM asistentes WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        $resultado = $qry->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetValue();
        $qry = "DELETE FROM asistentes WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $resultado;
    }
}
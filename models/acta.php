<?php
class Acta extends DB
{
    public function create($creador_id, $asunto, $fecha_creacion, $hora_inicio, $hora_final, $responsable_id, $orden_del_dia, $descripcion_hechos)
    {
        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $qry = "INSERT INTO actas(
             id,
             creador_id,
             asunto,
             fecha_creacion, 
             hora_inicio,
             hora_final,
             responsable_id,
             orden_del_dia,
             descripcion_hechos) VALUES (NULL,?,?,?,?,?,?,?,?);";

        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $creador_id);
        $qry->bindValue(2, $asunto);
        $qry->bindValue(3, $fecha_creacion);
        $qry->bindValue(4, $hora_inicio);
        $qry->bindValue(5, $hora_final);
        $qry->bindValue(6, $responsable_id);
        $qry->bindValue(7, $orden_del_dia);
        $qry->bindValue(9, $descripcion_hechos);
        $qry->execute();
        $id_acta = $inst->lastInsertId();
        $resultado = array(
            "id_acta"            => $id_acta,
            "creador_id"         => $creador_id,
            "asunto"             => $asunto,
            "fecha_creacion"     => $fecha_creacion,
            "hora_inicio"        => $hora_inicio,
            "hora_final"         => $hora_final,
            "responsable_id"     => $responsable_id,
            "orden_del_dia"      => $orden_del_dia,
            "descripcion_hechos" => $descripcion_hechos
        );
        return $resultado;
    }

    public function readAll()
    {
        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $qry = "SELECT * FROM actas";
        $qry = $inst->prepare($qry);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readById($id)
    {
        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $qry = "SELECT * FROM actas WHERE id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $id);
        $qry->execute();
        return $qry->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $creador_id, $asunto, $fecha_creacion, $hora_inicio, $hora_final, $responsable_id, $orden_del_dia, $descripcion_hechos)
    {
        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $qry = "UPDATE actas set
                creador_id         = ?,
                asunto             = ?,
                fecha_creacion     = ?,
                hora_inicio        = ?,
                hora_final         = ?,
                responsable_id     = ?,
                orden_del_dia      = ?,
                descripcion_hechos = ?
                WHERE
                id = ?";
        $qry = $inst->prepare($qry);
        $qry->bindValue(1, $creador_id);
        $qry->bindValue(2, $asunto);
        $qry->bindValue(3, $fecha_creacion);
        $qry->bindValue(4, $hora_inicio);
        $qry->bindValue(5, $hora_final);
        $qry->bindValue(6, $responsable_id);
        $qry->bindValue(7, $orden_del_dia);
        $qry->bindValue(9, $descripcion_hechos);
        $qry->bindValue(9, $id);
        $qry->execute();
        $resultado = array(
            "id_acta"            => $id,
            "creador_id"         => $creador_id,
            "asunto"             => $asunto,
            "fecha_creacion"     => $fecha_creacion,
            "hora_inicio"        => $hora_inicio,
            "hora_final"         => $hora_final,
            "responsable_id"     => $responsable_id,
            "orden_del_dia"      => $orden_del_dia,
            "descripcion_hechos" => $descripcion_hechos
        );
        return $resultado;
    }

    public function delete($id)
    {

        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $sql = "SELECT * FROM actas WHERE id = ?";
        $sql = $inst->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

        $inst = parent::getInstance();
        parent::setCharsetEncoding();
        $sql = "DELETE FROM actas WHERE id = ?";
        $sql = $inst->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado;
    }
}
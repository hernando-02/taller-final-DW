<?php

class ActasModel
{

    private $db;
    private $actas;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }


    public function getAllActas()
    {
        $sql = "SELECT * FROM actas";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->actas[] = $row;
        }
        return $this->actas;
    }


    public function getActa($id)
    {
        $sql = "SELECT * FROM actas WHERE id = '$id'";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $actas[] = $row;
        }
        return $actas;
    }


    public function createActa($creador_id, $asunto, $fecha_creacion, $hora_inicio, $hora_final, $responsable_id, $orden_del_dia, $descripcion_hechos)
    {
        $resultado = $this->db->query(
            "INSERT INTO actas ( creador_id,asunto,fecha_creacion,hora_inicio,hora_final,responsable_id,orden_del_dia,descripcion_hechos )
            VALUES ('$creador_id', '$asunto', '$fecha_creacion', '$hora_inicio', '$hora_final', '$responsable_id', '$orden_del_dia', '$descripcion_hechos')"
        );
    }


    public function updateActa($id, $creador_id, $asunto, $fecha_creacion, $hora_inicio, $hora_final, $responsable_id, $orden_del_dia, $descripcion_hechos)
    {
        $resultado = $this->db->query(
            "UPDATE actas
             SET creador_id = '$creador_id',
                 asunto = '$asunto',
                 fecha_creacion = '$fecha_creacion',
                 hora_inicio = '$hora_inicio',
                 hora_final = '$hora_final',
                 responsable_id = '$responsable_id',
                 orden_del_dia = '$orden_del_dia',
                 descripcion_hechos = '$descripcion_hechos'
             WHERE id = '$id'"
        );
    }


    public function deleteActa($id)
    {
        $resultado = $this->db->query("DELETE FROM actas WHERE id = '$id'");
    }

}
?>
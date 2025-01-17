<?php

    class Categoria extends Conectar
    {
        public function get_categoria()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categoria WHERE estado = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_x_id($id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categoria WHERE estado=1 AND id = ?";
            $sql = $conectar->prepare($sql);
            $sql ->bindValue(1, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($cat_nom, $cat_obs)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO categoria(id,cat_nom,cat_obs,estado) VALUES (NULL,?,?,'1')";
            $sql = $conectar->prepare($sql);
            $sql ->bindValue(1, $cat_nom);
            $sql ->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($id, $cat_nom, $cat_obs)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE categoria set cat_nom = ?, cat_obs = ? WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql ->bindValue(1, $cat_nom);
            $sql ->bindValue(2, $cat_obs);
            $sql ->bindValue(3, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_categoria($id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE categoria set estado = 0 WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql ->bindValue(1, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>
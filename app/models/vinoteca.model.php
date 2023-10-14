<?php

require_once 'app/models/models.php';

class VinotecaModel extends Model {

    function getVinos() {
        $query = $this->db->prepare('SELECT a.*, b.*, c.* FROM `vino` a INNER JOIN `cepa` b ON a.id_cepa = b.id_cepa INNER JOIN `bodega` c ON a.id_bodega = c.id_bodega ');
        $query->execute();
        $vinos = $query->fetchAll(PDO::FETCH_OBJ);

        return $vinos;
    }

    function getVino($id) {
        $query= $this->db->prepare('SELECT a.*, b.*, c.* FROM `vino` a INNER JOIN `cepa` b ON a.id_cepa = b.id_cepa INNER JOIN `bodega` c ON a.id_bodega = c.id_bodega  WHERE `ID_vino` = ?');
        $query->execute([$id]);
        $vino= $query->fetch(PDO::FETCH_OBJ);

        return $vino;
    }
            
    function getBodega($id) {
        $query= $this->db->prepare('SELECT * FROM `bodega`  WHERE `id_bodega` = ?');
        $query->execute([$id]);
        $bodega= $query->fetch(PDO::FETCH_OBJ);

        return $bodega;
    }

    function getBodegas() {
        $query= $this->db->prepare('SELECT * FROM `bodega`');
        $query->execute();
        $bodegas= $query->fetchAll(PDO::FETCH_OBJ);

        return $bodegas;
    }

    function getCepa($id) {
        $query= $this->db->prepare('SELECT * FROM `cepa`  WHERE `id_cepa` = ?');
        $query->execute([$id]);
        $cepa= $query->fetch(PDO::FETCH_OBJ);

        return $cepa;
    }

    function getCepas() {
        $query= $this->db->prepare('SELECT * FROM `cepa`');
        $query->execute();
        $cepas= $query->fetchAll(PDO::FETCH_OBJ);

        return $cepas;
    }

    function getVinosPorBodega($id) {
        $query= $this->db->prepare('SELECT a.*, b.*, c.* FROM `vino` a INNER JOIN `cepa` b ON a.id_cepa = b.id_cepa INNER JOIN `bodega` c ON a.id_bodega = c.id_bodega  WHERE a.id_cepa = ?');
        $query->execute([$id]);
        $vinos= $query->fetchAll(PDO::FETCH_OBJ);

        return $vinos;
    }

    function getVinosPorCepa($id) {
        $query= $this->db->prepare('SELECT a.*, b.*, c.* FROM `vino` a INNER JOIN `cepa` b ON a.id_cepa = b.id_cepa INNER JOIN `bodega` c ON a.id_bodega = c.id_bodega  WHERE a.id_cepa = ?');
        $query->execute([$id]);
        $vinos= $query->fetchAll(PDO::FETCH_OBJ);

        return $vinos;
    }

    function updateVino($Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa, $id) {    
        $query = $this->db->prepare('UPDATE `vino` SET Nombre=?, Tipo=?, Azucar=?, id_cepa=?, id_bodega =? WHERE ID_vino = ?');
        $query->execute([$Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa, $id]);
    }
    function updateBodega($Nombre_bodega, $Ubicación, $Año, $Características, $id) {    
        $query = $this->db->prepare('UPDATE `bodega` SET Nombre_bodega=?, Ubicación=?, Año=?, Características=? WHERE id_bodega = ?');
        $query->execute([$Nombre_bodega, $Ubicación, $Año, $Características, $id]);
    }

    function updateCepa($Nombre_cepa, $Aroma, $Maridaje, $Textura, $id) {    
        $query = $this->db->prepare('UPDATE `cepa` SET Nombre_cepa=?, Aroma=?, Maridaje=?, Textura=? WHERE id_cepa = ?');
        $query->execute([$Nombre_cepa, $Aroma, $Maridaje, $Textura, $id]);
    }

    function deleteVino($id){
        $query = $this->db->prepare('DELETE FROM `vino` WHERE ID_vino = ?');
        $query->execute([$id]);
    }

    function deleteBodega($id){
        $query = $this->db->prepare('DELETE FROM `bodega` WHERE id_bodega = ?');
        $query->execute([$id]);
    }

    function deleteCepa($id){
        $query = $this->db->prepare('DELETE FROM `cepa` WHERE id_cepa = ?');
        $query->execute([$id]);
    }

    function insertVino($Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa){
        $query = $this->db->prepare('INSERT INTO `vino` (Nombre, Tipo, Azucar, id_bodega, id_cepa) VALUES(?,?,?,?,?)');
        $query->execute([$Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa]);

        return $this->db->lastInsertId();
    }

    function insertBodega($Nombre_bodega, $Ubicación, $Año, $Características){
        $query = $this->db->prepare('INSERT INTO `bodega` (Nombre_bodega, Ubicación, Año, Características) VALUES(?,?,?,?)');
        $query->execute([$Nombre_bodega, $Ubicación, $Año, $Características]);

        return $this->db->lastInsertId();
    }

    function insertCepa($Nombre_cepa, $Aroma, $Maridaje, $Textura){
        $query = $this->db->prepare('INSERT INTO `cepa` (Nombre_cepa, Aroma, Maridaje, Textura) VALUES(?,?,?,?)');
        $query->execute([$Nombre_cepa, $Aroma, $Maridaje, $Textura]);

        return $this->db->lastInsertId();
    }
}
<?php

class VinotecaView{
    public function showHome(){
        require 'templates/home.phtml';
    }

    public function showVinos($vinos){
        require 'templates/mostrar_vinos_modificar.phtml';
    }

    public function showVinosPorBodega($vinos, $bodega){
        require 'templates/mostrar_vinos_por_bodega.phtml';
    }

    public function showVinosPorCepa($vinos, $cepa){
        require 'templates/mostrar_vinos_por_cepa.phtml';
    }
    
    public function showVino($vino){
        require 'templates/mostrar_vino.phtml';
    }

    public function showBodegas($bodegas){
        require 'templates/mostrar_bodegas_modificar.phtml';
    }

    public function showBodega($bodega){
        require 'templates/mostrar_bodega.phtml';
    }

    public function showCepas($cepas){
        require 'templates/mostrar_cepas_modificar.phtml';
    }

    public function showCepa($cepa){
        require 'templates/mostrar_cepa.phtml';
    }

    public function showBuscarPorBodega($bodegas){
        require 'templates/buscar_por_bodega.phtml';
    }

    public function showBuscarPorCepa($cepas){
        require 'templates/buscar_por_cepa.phtml';
    }
    
    public function showFormularioModificarVino($id, $vino, $bodegas, $cepas){
        require 'templates/formulario_modificacion_vino.phtml';
    }

    public function showFormularioModificarBodega($id, $bodega){
        require 'templates/formulario_modificacion_bodega.phtml';    
    }

    public function showFormularioModificarCepa($id, $cepa){
        require 'templates/formulario_modificacion_cepa.phtml';
    }

    public function showFormularioAgregarVino($bodegas, $cepas){
        require 'templates/formulario_agregar_vino.phtml';
    }

    public function showFormularioAgregarBodega(){
        require 'templates/formulario_agregar_bodega.phtml';
    }

    public function showFormularioAgregarCepa(){
        require 'templates/formulario_agregar_cepa.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
    
?>
<?php

require_once './app/models/vinoteca.model.php';
require_once './app/views/vinoteca.view.php';

class VinotecaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new VinotecaModel();
        $this->view = new VinotecaView();
        AuthHelper::init();
    }

    public function showHome(){
        $this->view->showHome();
    }

    public function showVinos(){
        $vinos = $this->model->getVinos();
        $this->view->showVinos($vinos);
    }

    public function showVino($id){
        $vino = $this->model->getVino($id);
        $this->view->showVino($vino);
    }
    
    public function showBodega($id){
        $bodega = $this->model->getBodega($id);
        $this->view->showBodega($bodega);
    }

    public function showBodegas(){
        $bodegas = $this->model->getBodegas();
        $this->view->showBodegas($bodegas);
    }

    public function showCepa($id){
        $cepa = $this->model->getCepa($id);
        $this->view->showCepa($cepa);
    }

    public function showCepas(){
        $cepas = $this->model->getCepas();
        $this->view->showCepas($cepas);
    }

    public function showBuscarPorBodega(){
        $bodegas = $this->model->getBodegas();
        $this->view->showBuscarPorBodega($bodegas);
    }

    public function showBuscarPorCepa(){
        $cepas = $this->model->getCepas();
        $this->view->showBuscarPorCepa($cepas);
    }

    public function showVinosPorBodega($id){
        $vinos = $this->model->getVinosPorBodega($id);
        $bodega = $this->model->getBodega($id);
        $this->view->showVinosPorBodega($vinos, $bodega);
    }


    public function showVinosPorCepa($id){
        $vinos = $this->model->getVinosPorCepa($id);
        $cepa = $this->model->getCepa($id);
        $this->view->showVinosPorCepa($vinos, $cepa);
    }

    public function showModificarVino($id){
        AuthHelper::verify();
        $vino = $this->model->getVino($id);
        $bodegas = $this->model->getBodegas();
        $cepas = $this->model->getCepas();
        $this->view->showFormularioModificarVino($id, $vino, $bodegas, $cepas);
    }

    public function modificarVino($id){
        AuthHelper::verify();
        $Nombre = $_POST['Nombre'];
        $Tipo = $_POST['Tipo'];
        $Azucar = $_POST['Azucar'];
        $id_bodega = $_POST['id_bodega'];
        $id_cepa = $_POST['id_cepa'];

        if (empty($Nombre) || empty($Tipo) || empty($Azucar) || empty($id_bodega) || empty($id_cepa)) {
            $this->view->showError("Debe completar todos los campos");
        }
        else{
            $this->model->updateVino($Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa, $id);
            $this->showVinos();
        }
    }
    public function showModificarBodega($id){
        AuthHelper::verify();
        $bodega = $this->model->getBodega($id);
        $this->view->showFormularioModificarBodega($id, $bodega);
    }
    

    public function modificarBodega($id){
        AuthHelper::verify();
        $Nombre_bodega = $_POST['Nombre_bodega'];
        $Ubicación = $_POST['Ubicación'];
        $Año = $_POST['Año'];
        $Características = $_POST['Características'];
        
        if (empty($Nombre_bodega) || empty($Ubicación) || empty($Año) || empty($Características)) {
            $this->view->showError("Debe completar todos los campos");
        }
        else{
            $this->model->updateBodega($Nombre_bodega, $Ubicación, $Año, $Características, $id);
            $this->showBodegas();
        }
    }

    public function showModificarCepa($id){
        AuthHelper::verify();
        $cepa = $this->model->getCepa($id);
        $this->view->showFormularioModificarCepa($id, $cepa);
    }
    
    public function modificarCepa($id){
        AuthHelper::verify();
        $Nombre_cepa = $_POST['Nombre_cepa'];
        $Aroma = $_POST['Aroma'];
        $Maridaje = $_POST['Maridaje'];
        $Textura = $_POST['Textura'];
        
        if (empty($Nombre_cepa) || empty($Aroma) || empty($Maridaje) || empty($Textura)) {
            $this->view->showError("Debe completar todos los campos");
        }
        else{
            $this->model->updateCepa($Nombre_cepa, $Aroma, $Maridaje, $Textura, $id);
            $this->showCepas();
        }
    }

    public function eliminarVino($id){
        AuthHelper::verify();
        $this->model->deleteVino($id);
        $this->showVinos();
    }

    public function eliminarBodega($id){
        AuthHelper::verify();
        $vinos = $this->model->getVinosPorBodega($id);
        if (empty($vinos)){
            $this->model->deleteBodega($id);
            $this->showBodegas();
        }else{
            $this->view->showError("No se puede eliminar, ya que esta bodega contiene los siguientes vinos: ");
            $bodega = $this->model->getBodega($id);
            $this->view->showVinosPorBodega($vinos, $bodega);
        }
    }

    public function eliminarCepa($id){
        AuthHelper::verify();
        $vinos = $this->model->getVinosPorCepa($id);
        if (empty($vinos)){
            $this->model->deleteCepa($id);
            $this->showCepas();
        }else{
            $this->view->showError("No se puede eliminar, ya que esta cepa contiene los siguientes vinos: ");
            $cepa = $this->model->getCepa($id);
            $this->view->showVinosPorCepa($vinos, $cepa);
        }
    }

    public function showAgregarVino(){
        AuthHelper::verify();
        $bodegas = $this->model->getBodegas();
        $cepas = $this->model->getCepas();
        $this->view->showFormularioAgregarVino($bodegas, $cepas);
    }

    public function agregarVino(){
        AuthHelper::verify();
        $Nombre = $_POST['Nombre'];
        $Tipo = $_POST['Tipo'];
        $Azucar = $_POST['Azucar'];
        $id_bodega = $_POST['id_bodega'];
        $id_cepa = $_POST['id_cepa'];

        if (empty($Nombre) || empty($Tipo) || empty($Azucar) || empty($id_bodega) || empty($id_cepa)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertVino($Nombre, $Tipo, $Azucar, $id_bodega, $id_cepa);
        if ($id) {
            $this->showVinos();
        } else {
            $this->view->showError("Error al insertar el vino");
        }
    }

    public function showAgregarBodega(){
        AuthHelper::verify();
        $this->view->showFormularioAgregarBodega();
    }

    public function agregarBodega(){
        AuthHelper::verify();
        $Nombre_bodega = $_POST['Nombre_bodega'];
        $Ubicación = $_POST['Ubicación'];
        $Año = $_POST['Año'];
        $Características = $_POST['Características'];

        if (empty($Nombre_bodega) || empty($Ubicación) || empty($Año) || empty($Características)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertBodega($Nombre_bodega, $Ubicación, $Año, $Características);
        if ($id) {
            $this->showBodegas();
        } else {
            $this->view->showError("Error al insertar la bodega");
        }
    }

    public function showAgregarCepa(){
        AuthHelper::verify();
        $this->view->showFormularioAgregarCepa();
    }

    public function agregarCepa(){
        AuthHelper::verify();
        $Nombre_cepa = $_POST['Nombre_cepa'];
        $Aroma = $_POST['Aroma'];
        $Maridaje = $_POST['Maridaje'];
        $Textura = $_POST['Textura'];
        
        if (empty($Nombre_cepa) || empty($Aroma) || empty($Maridaje) || empty($Textura)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertCepa($Nombre_cepa, $Aroma, $Maridaje, $Textura);
        if ($id) {
            $this->showCepas();
        } else {
            $this->view->showError("Error al insertar la cepa");
        }
    }   
}


<?php
require_once 'config.php';
require_once './app/controllers/vinoteca.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';

if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) { 
    case 'home':
        $controller= new VinotecaController();
        $controller->showHome();
        break;
    case 'listar':
        $controller= new VinotecaController();
        $controller->showVinos(); 
        break;
    case 'mostrarVino':
        $controller= new VinotecaController();
        $controller->showVino($params[1]); 
        break;
    case 'mostrarBodega':
        $controller= new VinotecaController();
        $controller->showBodega($params[1]); 
        break;
    case 'mostrarBodegas':
        $controller= new VinotecaController();
        $controller->showBodegas(); 
        break;
    case 'mostrarCepa':
        $controller= new VinotecaController();
        $controller->showCepa($params[1]); 
        break;
    case 'mostrarCepas':
        $controller= new VinotecaController();
        $controller->showCepas(); 
        break;
    case 'buscarVinosPorBodega':
        $controller= new VinotecaController();
        $controller->showBuscarPorBodega(); 
        break;
    case 'buscarVinosPorCepa':
        $controller= new VinotecaController();
        $controller->showBuscarPorCepa(); 
        break;
    case 'mostrarVinosPorBodega':
        $controller= new VinotecaController();
        $controller->showVinosPorBodega($params[1]); 
        break;
    case 'mostrarVinosPorCepa':
        $controller= new VinotecaController();
        $controller->showVinosPorCepa($params[1]); 
        break;
    case 'eliminarVino':
        $controller= new VinotecaController();
        $controller->eliminarVino($params[1]); 
        break;
    case 'modificarVino':
        $controller= new VinotecaController();
        $controller->showModificarVino($params[1]); 
        break;
    case 'enviarModificarVino':
        $controller= new VinotecaController();
        $controller->modificarVino($params[1]); 
        break;
    case 'agregarVino':
        $controller= new VinotecaController();
        $controller->showAgregarVino(); 
        break;
    case 'enviarAgregarVino':
        $controller= new VinotecaController();
        $controller->agregarVino(); 
        break;
    case 'eliminarBodega':
        $controller= new VinotecaController();
        $controller->eliminarBodega($params[1]); 
        break;
    case 'modificarBodega':
        $controller= new VinotecaController();
        $controller->showModificarBodega($params[1]); 
        break;
    case 'enviarModificarBodega':
        $controller= new VinotecaController();
        $controller->modificarBodega($params[1]); 
        break;
    case 'agregarBodega':
        $controller= new VinotecaController();
        $controller->showAgregarBodega(); 
        break;
    case 'enviarAgregarBodega':
        $controller= new VinotecaController();
        $controller->agregarBodega(); 
        break;
    case 'eliminarCepa':
        $controller= new VinotecaController();
        $controller->eliminarCepa($params[1]); 
        break;
    case 'modificarCepa':
        $controller= new VinotecaController();
        $controller->showModificarCepa($params[1]); 
        break;
    case 'enviarModificarCepa':
        $controller= new VinotecaController();
        $controller->modificarCepa($params[1]); 
        break;
    case 'agregarCepa':
        $controller= new VinotecaController();
        $controller->showAgregarCepa(); 
        break;
    case 'enviarAgregarCepa':
        $controller= new VinotecaController();
        $controller->agregarCepa(); 
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        $controller= new VinotecaController();
        $controller->showHome();
        break;
}







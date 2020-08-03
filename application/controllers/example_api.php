<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    exit;
}
use chriskacerguis\RestServer\RestController;
class Example_api extends RestController {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('codigoPais_model');
        
    }
    public function codigo_post()
    {


        echo '¡Hola ' . htmlspecialchars($_POST["nombre"]) . '!';
        //$data = $this->post();

        //$this->response($data, RestController::HTTP_OK);
        
    }
    public function codigo_get()
    {
    $codigo_id = $this->uri->segment(3);
        if( !isset( $codigo_id)){
            $respuesta = array(
                'error' => TRUE,
                'mensaje' => 'Es necesario el ID del pais.'
                );
            $this->response( $respuesta, RestController::HTTP_BAD_REQUEST );
            return; 
        }
    $codigo = $this->codigoPais_model->ConsultarCodigo( $codigo_id );
        if( isset($codigo)){
            $respuesta = array(
                'error' => FALSE,
                'mensaje' => 'Consulta cargada correctamente',
                'resultado' => $codigo
            );
            $this->response( $respuesta, RestController::HTTP_OK );
        } else{
            $respuesta = array(
                'error' => TRUE,
                'mensaje' => 'El codigo de pais con el Id ' . $codigo_id . ',no existe',
                'codigo del pais' => null
            );
            $this->response( $respuesta, RestController::HTTP_NOT_FOUND );
        }
    }
}
?>
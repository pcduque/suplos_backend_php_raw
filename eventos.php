<?php
require_once 'clases/respuestas.class.php';
require_once 'clases/eventos.class.php';

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 3600");

$_respuestas = new respuestas;
$_eventos = new eventos;


if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaPacientes = $_eventos->listaEventos($pagina);
        echo json_encode($listaPacientes);
        http_response_code(200);
    }else if(isset($_GET['clasificadores'])){
        $datos = $_eventos->obtenerClasificador();
        header("Content-Type: application/json");
        echo json_encode($datos);
        http_response_code(200);
    }
    else if(isset($_GET['publicar'])){
        header("Content-Type: application/json");
        $pg = $_GET["publicar"];
        $listaPacientes = $_eventos->publicarEvento($pg);
        echo json_encode($listaPacientes);
        http_response_code(200);
    }else if(isset($_GET['evaluacion'])){
        header("Content-Type: application/json");
        $pg = $_GET["evaluacion"];
        $listaPacientes = $_eventos->evaluacion($pg);
        echo json_encode($listaPacientes);
        http_response_code(200);
    }
    else if(isset($_GET['id'])){
        $pacienteid = $_GET['id'];
        $datosPaciente = $_eventos->obtenerPaciente($pacienteid);
        header("Content-Type: application/json");
        echo json_encode($datosPaciente);
        http_response_code(200);
    }
    
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos los datos al manejador
    $datosArray = $_eventos->post1($postBody);
    //delvovemos una respuesta 
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);
    
}else if($_SERVER['REQUEST_METHOD'] == "PUT"){
      //recibimos los datos enviados
      $postBody = file_get_contents("php://input");
      //enviamos datos al manejador
      $datosArray = $_eventos->put($postBody);
        //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);

}else if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $headers = getallheaders();
        if(isset($headers["token"]) && isset($headers["pacienteId"])){
            //recibimos los datos enviados por el header
            $send = [
                "token" => $headers["token"],
                "pacienteId" =>$headers["pacienteId"]
            ];
            $postBody = json_encode($send);
        }else{
            //recibimos los datos enviados
            $postBody = file_get_contents("php://input");
        }
        
        //enviamos datos al manejador
        $datosArray = $_eventos->delete($postBody);
        //delvovemos una respuesta 
        header('Content-Type: application/json');
        if(isset($datosArray["result"]["error_id"])){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
       

}else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API - Supplos</title>
    <link rel="stylesheet" href="assets/estilo.css" type="text/css">
</head>
<body>

<div  class="container">
    <h1>Api de pruebas</h1>
    <div class="divbody">
        <h3>Auth - login</h3>
        <code>
           POST  /auth
           <br>
           {
               <br>
               "usuario" :"",  -> REQUERIDO
               <br>
               "password": "" -> REQUERIDO
               <br>
            }
        
        </code>
    </div>      
    <div class="divbody">   
        <h3>Eventos</h3>
        <code>
           GET  /eventos?page=$numeroPagina
           <br>
           GET  /eventos?id=$idPaciente
        </code>

        <code>
           POST  /eventos
           <br> 
           {
            <br> 
               "objeto" : "",               -> REQUERIDO
               <br> 
               "descripcion" : "",                  -> REQUERIDO
               <br> 
               "moneda":"",                 -> REQUERIDO
               <br> 
               "presupuesto" :"",             
               <br>  
               "fecha_inicio" : "",        
               <br>        
               "fehca_fin" : "",       
               <br>       
               "estado" : "",      
               <br>         
               "token" : ""                 -> REQUERIDO        
               <br>       
           }

        </code>
        <code>
           PUT  /pacientes
           <br> 
           {
            <br> 
               "objeto" : "",               -> REQUERIDO
               <br> 
               "descripcion" : "",                  -> REQUERIDO
               <br> 
               "moneda":"",                 -> REQUERIDO
               <br> 
               "presupuesto" :"",             
               <br>  
               "fecha_inicio" : "",        
               <br>        
               "fehca_fin" : "",       
               <br>       
               "estado" : "",      
               <br>         
               "token" : ""                 -> REQUERIDO        
               <br>         
               "id" : ""   -> REQUERIDO
               <br>
           }

        </code>
        <code>
           DELETE  /pacientes
           <br> 
           {   
               <br>    
               "token" : "",                -> REQUERIDO        
               <br>       
               "id" : ""   -> REQUERIDO
               <br>
           }

        </code>
    </div>


</div>
    
</body>
</html>


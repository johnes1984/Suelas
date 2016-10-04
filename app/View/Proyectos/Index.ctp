





 <html>    
<head>
    <title>My Angular App</title>

    
  
  </head>

  
 
   <body>

       
   
  <h2>Proyectos</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#">Listar</a></li>
     <li><a  href="/proyectos/add">Agregar</a></li>
  </ul>

  <div class="tab-content">
      <div ng-app="Medical">
         <div ng-controller="prueba">
    <div id="listar" class="tab-pane fade in active">
     
      
        
       
            
            <table class="table table-striped table-hover " id="id_tabla">
            <thead>
            <tr>
            
            <th>Id</th>
            <th>Proyecto</th>
            <th>editar</th>
            <th>Suprimir</th>
            </tr>
            </thead>
            <tbody>
           
           
            
              
                <tr ng-repeat="n in cargar ">
                <td class="col-md-1">{{n.Proyecto.proy_id}}</td>
                <td id="{{n.Proyecto.proy_id}}">{{n.Proyecto.proy_nombre}}</td>
                <td class="col-md-1"><a href="proyectos/editar/{{n.Proyecto.proy_id}}"><button type="button" class="btn btn-success">Editar</button></a></td>
                <td class="col-md-1"><a href="proyectos/suprimir/{{n.Proyecto.proy_id}}"> <button type="button" class="btn btn-danger">Suprimir</button></a></td>
                </tr>
             

                
              </tbody>
            </table>
            
        


          

        
        
        
    </div>

   
    
             
             </div>
      </div>
  </div>
   
       
       
       
       

</body>
     
     
     






     
     
   
     
     
     
    
<script>
   
   
    
        
    var app = angular.module('Medical',[])
    
    app.controller('prueba', function($scope,$http,$rootScope,$window ){
        
        
   $http.get("/Proyectos/proyectos/carga")
      .success(function(response) {     
       $rootScope.cargar = response;
   });

 
    $scope.fncSuprimir = function(valor){
    $http.get("/Proyectos/proyectos/suprimir")
      .success(function(response) {     
      
   });
    };
        
      
        
        
        
        
        
        
        
        
        });
          
    
       
        

</script>
   
     
   
     
    </html>
<h1>listado estudiantes</h1>

<pre>
<?php echo json_encode($estudaintes);?>
</pre>



 <html>    
<head>
    <title>My Angular App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
  </head>

     
    <div ng-app>
    <input type="text" name="userName" ng-model="nombre">
    <div> {{nombre}} </div>     

    </div>
     
     
<script>
    var x = <?php echo json_encode($estudaintes);?>

     //   alert(x.Usuario.Usu_Id)

</script>
   
     
   
     
    </html>
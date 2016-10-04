
<html>    
<head>
<title>My Angular App</title>



</head>

<?php 
print_r($envio);
?>
    
    

<body>
    


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>

  <!-- Table -->
  <table class="table">
    ...
  </table>
</div>
    
    
    
    
    
    
    
    
    
    
    
    <div <div class="container">
    <table class="table" >
    <tr>
        <td><?php echo $this->Paginator->sort('id');?></td>
        <td><?php echo $this->Paginator->sort('nombre');?></td>
        <td><?php echo $this->Paginator->sort('usuario');?></td>
        <td><?php echo $this->Paginator->sort('editar');?></td>
        <td><?php echo $this->Paginator->sort('suprimir');?></td>
    </tr>
        
    <?php foreach ($envio as $k => $Group ) { ?>
    <tr>
        <td><?php echo $Group['Group']['id'] ?></td>
        <td class="col-md-1"><?php echo $Group['Group']['nombre'] ?></td>
        <td><?php echo $Group['Group']['usuario'] ?></td>
        <td class="col-md-1"><a href="../Inventario/Groups/editar/<?php echo $Group['Group']['id'] ?>"> <button type="button" class="btn btn-danger">Editar</button></a></td>
        <td class="col-md-1"><a href="../Inventario/Groups/suprimir/<?php echo $Group['Group']['id'] ?>"> <button type="button" class="btn btn-danger">Suprimir</button></a></td>
        
     </tr>
    <?php } ?>

      
        
       
    </table>
    </div>
</body>
</html>

<?php

/*echo $this->Form->create('Usuario');
echo $this->Form->input('nombre');
echo $this->Form->input('usuario');
echo $this->Form->end('Guardar estudiante');*/
?>


<h2>Agregar</h2>


  <ul class="nav nav-tabs">
        <li><a href="/Proyectos/proyectos">Listar</a></li>
       <li class="active"><a data-toggle="tab" href="#">Agregar</a></li>
  </ul>

  <div class="tab-content">
    
    <div id="listar" class="tab-pane fade in active">

        
     <?php echo $this->Form->create('Proyecto');?>
     <?php echo $this->Form->input('proy_nombre'); ?>     
     <?php echo $this->Form->input('proy_descripcion', array('type' => 'text')); ?>
     <?php echo $this->Form->input('proy_impacto', array('type' => 'text')); ?>
     <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary')); ?>
        
        
        
        

        

             </div>

</div>



<script>


</script>
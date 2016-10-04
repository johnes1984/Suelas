
<?php

/*echo $this->Form->create('Usuario');
echo $this->Form->input('nombre');
echo $this->Form->input('usuario');
echo $this->Form->end('Guardar estudiante');*/
        
?>


<h2>Editar</h2>




     <?php echo $this->Form->create('Proyecto');?>
     <?php echo $this->Form->input('proy_id'); ?>
     <?php echo $this->Form->input('proy_nombre',array('label' => 'Nombre')); ?>     
     <?php echo $this->Form->input('proy_descripcion', array('type' => 'text')); ?>
     <?php echo $this->Form->input('proy_impacto', array('type' => 'text')); ?>
     <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary')); ?>
          
          
    <?php echo $this->Form->end(); ?>

<h2>Editar</h2>




     <?php echo $this->Form->create('Group');?>
     <?php echo $this->Form->input('nombre',array('label' => 'nombre')); ?>
     <?php echo $this->Form->input('usuario',array('label' => 'usuario')); ?>     
     <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary')); ?>   
     <?php echo $this->Form->end(); ?>

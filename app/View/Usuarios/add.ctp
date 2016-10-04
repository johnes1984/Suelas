<h1>agregar</h1>

<?php

/*echo $this->Form->create('Usuario');
echo $this->Form->input('nombre');
echo $this->Form->input('usuario');
echo $this->Form->end('Guardar estudiante');*/
?>



<form name="formulario" method="post" action="/cakephp/usuarios/add">
Nombre: <input type="text" name="usu_nombre" value="">
    usuario: <input type="text" name="usu_usuario" value="">
<input type="submit" />
</form>


<script>


</script>
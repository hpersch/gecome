<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>

<article>
<?php foreach($marcas AS $data): ?>
	<h1><?php echo $data['Marca']['nome'] ?></h1>
<?php endforeach; ?>
</article>

<?php
echo $this->Paginator->prev('« Mais novas', null, null, array('class' => 'desabilitado'));
echo $this->Paginator->numbers();
echo $this->Paginator->next('Mais antigas »', null, null, array('class' => 'desabilitado'));
?>
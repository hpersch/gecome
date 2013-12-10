
<?php

$this->extend('/Novos/view');

$this->assign('title', "grande titulo");

$this->start('sidebar');
?>
<li>
<?php
echo $this->Html->link('edit', array(
    'controller'=>'estados',
    'action' => 'index'
)); ?>
</li>
<?php $this->end(); ?>
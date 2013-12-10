
<?php   
    
    $texto = "";
  foreach ($message as $value) {
      $texto = $texto + $value[0];
  }  
  ?>
<div class="alert alert-error" onshow="mostraErros(<?php echo $texto ;?>)">
<!--form de erros de cadastro-->
  
</div>

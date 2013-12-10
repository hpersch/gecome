<div class="alert alert-error">
     <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>Warning!</h4>
  <?php 
  
    foreach ($message as $value) {
        echo $value[0]."<br>";
    }
  
  ?>
</div>
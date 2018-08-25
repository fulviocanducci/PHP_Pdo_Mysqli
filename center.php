<div class="text-center jumbotron">
   <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <?php if ($id > 0): ?>
      <input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
      <?php endif; ?>
      <div class="form-group">
      <label>Descrição</label>
      <input type="text" name="description" class="form-control" id="description" value="<?php echo $description;?>" required autofocus autocomplete="off" />
      </div>
      <button type="submit" class="btn btn-success">
         <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  
         <?php echo $btn; ?>
      </button>
      <a href="logs.php" class="btn btn-info">
      <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> 
         Voltar
      </a>
   </form> 
</div>

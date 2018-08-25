<table class="table table-striped">
   <tr>
      <td colspan="3" class="text-center">
         <button onclick="location.href='create.php'" class="btn btn-primary">
         <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  
         Incluir
         </button>
      </td>
   </tr>
   <tr>
      <td colspan="3" class="text-center">
         <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="get">
            <div class="row">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div class="input-group">
                     <input type="text" 
                        name="filter" 
                        id="filter" 
                        value="<?php echo $filter;?>" 
                        class="form-control" 
                        placeholder="Filtrar ...">
                     <span class="input-group-btn">
                     <button class="btn btn-default" type="submit">
                     <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                     </button>
                     </span>
                  </div>
               </div>
               <div class="col-lg-3"></div>
            </div>
         </form>
      </td>
   </tr>
   <tr>
      <th class="text-center">Id</th>
      <th class="text-center">Descrição</th>
      <th class="text-center">...</th>
   </tr>
   <?php foreach ($list as $value) : ?>
   <tr>
      <td style="width:10%" class="text-center"><?php echo str_pad($value->id, 5, '00000', 0); ?></td>
      <td style="width:70%"><?php echo $value->description; ?></td>
      <td style="width:20%" class="text-center">
         <a href="edit.php?id=<?php echo $value->id;?>" class="btn btn-default">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            Alterar
         </a>
      </td>
   </tr>
   <?php endforeach; ?>
</table>
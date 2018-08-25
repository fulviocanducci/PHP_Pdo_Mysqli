<?php include 'variables.php'; ?>
<?php
   $id = 1;
   $description = "";
   $db = new database();
   $btn = "Alterar";
   if (isset($_POST) && count($_POST) > 0)
   {      
      if ($db->edit('logs', $_POST, ['id' => $_POST['id']]) )
      {
         header('location: logs.php', true);
         die();
      }      
   }
   if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
   {  
      $logs = $db->get('logs', ['id' => $_GET['id']]);
      $id = $logs->id;
      $description = $logs->description;
   }   
?>
<?php include 'header.php'; ?>
<?php include 'center.php'; ?>  
<?php include 'footer.php'; ?>
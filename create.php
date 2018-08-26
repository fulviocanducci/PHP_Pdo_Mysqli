<?php include 'variables.php'; ?>
<?php
   $id = 0;
   $description = "";
   $db = new database();
   $btn = "Inserir";
   if (isset($_POST) && count($_POST) > 0) {
      if ($db->add('logs', $_POST)) {
         header('location: logs.php', true);
         die();
      }
   }
?>
<?php include 'header.php'; ?>
<?php include 'center.php'; ?>
<?php include 'footer.php'; ?>

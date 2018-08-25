<?php include 'dbanco.php'; ?>
<?php   
   $db = new database();   
   $filter = isset($_GET['filter']) ? $_GET['filter']: '';
   $list = $db->getAll('logs', ['description' => ['like', "%$filter%"]], ['description' => 'ASC']);   
?>
<?php include 'header.php'; ?>
<?php include 'list.php'; ?>  
<?php include 'footer.php'; ?>
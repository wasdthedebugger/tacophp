<?php require 'database/conn.php'; ?>

header

<hr>

<?php require 'modules/functions.php'; 
echo "<h1>$page</h1>";
echo(allPages($pages, $page));
?>
<hr>


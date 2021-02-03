<?php @session_start();

$customer = unserialize($_SESSION["e"]);
?>

<?=$customer->getMail()?>
</body>
</html>

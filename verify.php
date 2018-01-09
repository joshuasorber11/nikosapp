<?php
$stmt = $odb->prepare("SELECT `num_attacks` FROM `ip_whitelist` WHERE `ip`=?");
$stmt->execute(array($_SERVER['REMOTE_ADDR']));
if($stmt->rowCount() != 1)
{
  header("Location: ./notallowed.php");


}
else {
  $num = $stmt->fetchColumn();
}



?>

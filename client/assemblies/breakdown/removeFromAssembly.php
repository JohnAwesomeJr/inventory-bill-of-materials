<?php
require_once "/var/www/html/connection.php";
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM assemblycomponents WHERE AssemblyComponentID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
echo "<br><br><br><br><br><br><br>Record deleted successfully";
$stmt->close();

// close at end of file after all queries are done
$conn->close();
?>
<?php require_once "/var/www/html/htmlHead.php";?>
<?php require_once "/var/www/html/htmlFoot.php";?>
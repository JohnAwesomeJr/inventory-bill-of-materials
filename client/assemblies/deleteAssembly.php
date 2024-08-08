<?php
require_once "/var/www/html/connection.php";
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM assemblies WHERE AssemblyID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
echo "Record deleted successfully";
$stmt->close();
// close at end of file after all queries are done
$conn->close();
?>
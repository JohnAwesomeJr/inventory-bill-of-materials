<?php
require_once "/var/www/html/connection.php";

$partId = $_POST['partId'];
$assemblyId = $_POST['assemblyId'];
$quantity = $_POST['quantity'];


$stmt = $conn->prepare("INSERT INTO assemblycomponents (ParentAssemblyId, ChildPartId, Quantity) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $assemblyId, $partId, $quantity);
$stmt->execute();
$newly_inserted_id = $conn->insert_id;
require_once "/var/www/html/htmlHead.php";
echo "<br><br><br><br>";
echo "New record created successfully with ID: " . $newly_inserted_id;
require_once "/var/www/html/htmlFoot.php";
$stmt->close();
// close at end of file after all queries are done
$conn->close();
?>
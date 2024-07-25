<?php
require_once "/var/www/html/connection.php";

$parentAssemblyId = $_POST['parentAssemblyId'];
$childAssemblyId = $_POST['childAssemblyId'];
$quantity = $_POST['quantity'];


$stmt = $conn->prepare("INSERT INTO assemblycomponents (ParentAssemblyId, ChildAssemblyId, Quantity) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $parentAssemblyId, $childAssemblyId, $quantity);
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
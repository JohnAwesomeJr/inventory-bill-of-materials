<?php
require_once "/var/www/html/connection.php";

$assemblyName = $_POST['assemblyName'];

// Check for duplicate entry
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM assemblies WHERE assemblyName = ?");
$checkStmt->bind_param("s", $assemblyName);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
    // Duplicate found, show error message
    echo "<p style='color:red;' >Error: An assembly with the name '$assemblyName' already exists. Please choose a different name." . '</p>';
} else {
    // No duplicate, proceed with insert
    $stmt = $conn->prepare("INSERT INTO assemblies (assemblyName) VALUES (?)");
    $stmt->bind_param("s", $assemblyName);
    $stmt->execute();
    $newly_inserted_id = $conn->insert_id;
    require_once "/var/www/html/htmlHead.php";
    echo "<br><br><br><br>";
    echo "<p style='color:green;' >New record created successfully with ID: " . $newly_inserted_id . '</p>';
    require_once "/var/www/html/htmlFoot.php";
    $stmt->close();
}

$conn->close();
?>

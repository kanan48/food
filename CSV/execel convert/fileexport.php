<?php
    $conn = mysqli_connect("localhost", "root", "", "adminpanel");
    $filename = "admin.csv";
    $fp = fopen('php://output', 'w');
    $tableschema = 'adminpanel';
    $tablename = 'product';
    $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA= ? AND TABLE_NAME =?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ss', $tableschema, $tablename);
    $statement->execute();
    $result = $statement->get_result();
	
    while ($row = $result->fetch_array()) {
        $header[] = $row[0];
    }
	
    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename=' . $filename);
    fputcsv($fp, $header);
    $sql = "SELECT * FROM product";
    $statement = $conn->prepare($sql); 
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }
    exit();
?>
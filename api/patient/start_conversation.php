<?php

require_once('../../globals.php');
require_once($GLOBALS['srcdir'] . '/sql.inc');

$patientId = $_GET['patient_id'];

if (!$patientId) {
    http_response_code(400);
    echo json_encode(['error' => 'Patient ID is required']);
    exit;
}

$sql = "SELECT * FROM patient_data WHERE id = ?";
$result = sqlQuery($sql, [$patientId]);

if ($result) {
    echo json_encode($result);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Patient not found']);
}
?>
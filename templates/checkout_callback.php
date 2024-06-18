<?php
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Verify Payment and update database

    // Sends response back to Dusupay
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'success'));

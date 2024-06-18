<?php
    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        require '../api/config.php';

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $amount = htmlspecialchars($_POST['amount']);

        // DusuPay API
        $api_url = 'https://www.dusupay.com/api/v1/checkout/initiate';
        $api_key = 'YOUR_API_KEY';
        $api_secret = 'YOUR_API_SECRET';

        // Prepare data for Dusupay API
        $data = array(
            'api_key' => $api_key,
            'amount' => $amount,
            'currency' => 'USD',
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_phone' => $phone,
            'redirect_url' => 'http://localhost/mtctemplates-github/templates/download.php',
            'callback_url' => 'http://localhost/mtctemplates-github/templates/checkout_callback.php',
        );

        // JSON format
        $data_json = json_encode($data);

        // Initialize cURL session
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

        // Execute cURL Request
        $response = curl_exec($ch);
        curl_close($ch);

        // Decode response
        $response_data = json_decode($response, true);

        if (!isset($response_data['status']) && $response_data['status'] == 'success') {
            header('Location: '.$response_data['payment_url']);
            exit();
        } else {
            echo 'Payment failed. Please try again after two (2) minutes.';
        }
    }

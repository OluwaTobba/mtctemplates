<?php
    declare(strict_types=1);

    require '../vendor/autoload.php';

    use Flutterwave\Controller\PaymentController;
    use Flutterwave\EventHandlers\ModalEventHandler as PaymentHandler;
    use Flutterwave\Flutterwave;
    use Flutterwave\Library\Modal;

    session_start();

    try {
        Flutterwave::bootstrap();
        $customHandler = new PaymentHandler();
        $client = new Flutterwave();
        $modalType = Modal::POPUP;
        $controller = new PaymentController($client, $customHandler, $modalType);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    $request = $_GET;

    if (isset($request['tx_ref'])) {
        try {
            $response = $controller->callback($request);
            if ($response->status === 'successful') {
                header('Location: download.php');
                exit();
            } else {
                echo 'Payment failed or was not successful';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo 'Transaction reference not found';
    }

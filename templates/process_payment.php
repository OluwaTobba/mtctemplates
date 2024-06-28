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
        $modalType = Modal::POPUP; // Modal::POPUP or Modal::STANDARD
        $controller = new PaymentController( $client, $customHandler, $modalType );
    } catch(\Exception $e ) {
        echo $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $request = $_REQUEST;
        $request['redirect_url'] = 'http://localhost/mtctemplates-github/templates/callback.php';
        try {
            $controller->process( $request );
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    $request = $_GET;
    # Confirming Payment.
    if(isset($request['tx_ref'])) {
        $controller->callback( $request );
    } else {
        
    }
    exit();

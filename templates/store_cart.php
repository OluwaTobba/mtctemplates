<?php
    session_start();

    if (isset($_POST['cart'])) {
        $_SESSION['cart'] = $_POST['cart'];
    }

    echo "Cart stored in session";

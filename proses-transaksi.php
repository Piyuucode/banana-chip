<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $menu = $_POST['menu'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    // Email setup using PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->setFrom('vhioadityaa@email.com', 'vhio aditya');
        $mail->addAddress('vhioadityaa@email.com'); // Replace with your email address
        $mail->Subject = 'New Order';
        $mail->Body = "Nama: $name\nAlamat: $address\nPilih Menu: $menu\nJumlah: $quantity\nTotal Harga: $total";

        // Send email
        $mail->send();

        // Optionally, you can redirect the user to a thank-you page
        header("Location: product.html");
        exit();
    } catch (Exception $e) {
        // Handle exception, e.g., display an error message
        echo "Error: " . $mail->ErrorInfo;
    }
}
?>

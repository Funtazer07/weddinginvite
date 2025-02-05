<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $familyMembers = isset($_POST["family"]) ? $_POST["family"] : '';
    $attendance = isset($_POST["attendance"]) ? $_POST["attendance"] : '';
    $drinks = isset($_POST["drinks"]) ? $_POST["drinks"] : array();

    // Convert drinks array to string if multiple options selected
    $drinksString = is_array($drinks) ? implode(", ", $drinks) : $drinks;

    $toEmail = "andvoskin@gmail.com";  // Replace with your email address
    
    // Prepare email subject
    $subject = "Wedding form from " . $name;

    // Prepare email body
    $mailBody = "Name: " . $name . "\r\n" .
                "Family Members: " . $familyMembers . "\r\n" .
                "Attendance: " . $attendance . "\r\n" .
                "Drink Preferences: " . $drinksString . "\r\n";

    // Send email
    if (mail($toEmail, $subject, $mailBody)) {
        echo "<script>alert('Спасибо! Ваш ответ получен.');</script>";
    } else {
        echo "<script>alert('Извините, произошла ошибка при отправке.');</script>";
    }

    // Redirect back to the form
    echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 400);</script>";
    exit;
}
?>

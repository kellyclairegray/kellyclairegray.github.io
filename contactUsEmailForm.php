<?php
if (isset($_POST["submit"])){

    // check for blank fields
    if ($_POST["name"] == "" || $_POST["email"] == "" || $_POST["message"] == "") {
        echo "You Must Fill All Form Fields.";
    }
    else {
        $email = $_POST['email'];
        // sanitize & validate email Address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$email) {
            echo "Invalid Email Provided.";
        }
        else {
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = 'From:'. $email2 . "rn"; // sender's Email
            $headers .= 'Cc:'. $email2 . "rn"; // CC to sender

            // message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // send mail using php function
            mail("jrstalter11@gmail.com", $subject, $message, $headers);
            echo "Your mail has been sent successfuly! Thank you for contacting us.";
        }
    }
}
?>
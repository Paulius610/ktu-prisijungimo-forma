<?php
if(isset($_POST['send'])) {
    if(empty($_POST['email'])) {
        echo('<p class="error">You did not fill in a required field.</p>');
    } else {
        $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));

        $sql = "SELECT email='$email' FROM db";

        if (@mysql_query($sql)) {
            echo('<p class="success">Thanks for shouting!</p>');
        } else {
            echo('<p class="error">There was an unexpected error when submitting your shout.</p>');
        }
    }
}
</php>
<?php
if (current_user_can('manage_options')) {
    # this code will be executed only if user has privileges development
}
;
$to = "email@example.com";
$subject = "test mail";
$content = "This is a test message";
wp_mail($to, $subject, $content);
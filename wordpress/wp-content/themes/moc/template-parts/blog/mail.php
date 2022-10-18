
<?php
    $post_type = $_POST['feedback_type'];

    $post_id = $_POST['post_id'];
    $post_title = $_POST['post_title'];
    $subject = 'Blogpost feedback: ' . $post_title;
    $recipient = 'cs120879div1@gmail.com';
    $user_info = $_POST['current_ip_info'];

    $content = $_POST['feedback_content'];
    $headers = 'From: Admin <no-reply@masterofcode.com>' . "\r\n";


    $body = "Post title: $post_title \n\nIs Feedback Positive: $post_type \n\nComment: $content \n\nUser info: $user_info";

    mail($recipient, $subject, $body, $headers);
    $emailSent = true;

    blogpost_feedback_save($post_id, $post_type, $post_title, $content);
?>

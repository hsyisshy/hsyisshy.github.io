<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp;
    public $ajax;

    public function add_message($content, $label = '', $length = 0) {
        // Add message content to email body
        // Optionally, you can add label and limit message length
    }

    public function send() {
        // Send email using PHP's mail() function
        $headers = "From: $this->from_name <$this->from_email>" . "\r\n";
        $headers .= "Reply-To: $this->from_email" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

        $message = "Message from: $this->from_name <$this->from_email><br>";
        $message .= "Subject: $this->subject<br><br>";
        $message .= "Message:<br>";
        $message .= nl2br($this->add_message($_POST['message']));

        if ($this->smtp) {
            // Send email using SMTP
            // Implement SMTP logic here
        } else {
            // Send email using mail() function
            if (mail($this->to, $this->subject, $message, $headers)) {
                return 'Message sent successfully!';
            } else {
                return 'Unable to send message. Please try again later.';
            }
        }
    }
}
?>

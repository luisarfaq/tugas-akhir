<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{
    $ci = get_instance();
    $ci->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "smtp.gmail.com";
    $config['smtp_crypto'] = "ssl";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "boyastro768@gmail.com";
    $config['smtp_pass'] = "Astroboy-111";
    $config['charset'] = "iso-8859-1";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $ci->email->initialize($config);
    $ci->email->from('boyastro768@gmail.com', "Topgear Coffee & Roastery");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    if ($ci->email->send()) {
        echo 'Your Email has successfully been sent.';
    } else {
        echo($ci->email->print_debugger());
        die;
    }
}

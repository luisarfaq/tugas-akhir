<?php
error_reporting(0);
function kirim_email($email, $subject, $message)
{


    $is_hosting = $_SERVER['SERVER_NAME'] === 'localhost'?false:true;

    if ($is_hosting) {
        $smtp_host = 'mail.topgear-coffee.my.id';
        $smtp_user = 'admin@topgear-coffee.my.id';
        $smtp_pass = 'topgear-123';
    }else{
        $smtp_host = 'smtp.gmail.com';
        $smtp_user = 'boyastro768@gmail.com';
        $smtp_pass = 'Astroboy-111';
    }

    $ci = get_instance();
    $ci->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = $smtp_host;
    $config['smtp_crypto'] = "ssl";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = $smtp_user;
    $config['smtp_pass'] = $smtp_pass;
    $config['charset'] = "iso-8859-1";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $ci->email->initialize($config);
    $ci->email->from($smtp_user, "Topgear Coffee & Roastery");
    $ci->email->to("$email");
    $ci->email->subject("$subject");
    $ci->email->message("$message");
    if ($ci->email->send()) {
        echo 'Your Email has successfully been sent.';
        return true;
    } else {
        echo($ci->email->print_debugger());
        die;
    }
}

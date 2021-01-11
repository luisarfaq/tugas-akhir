<?php

function get_notif($id)
{
    $ci = get_instance();
    $params = array('server_key' => 'SB-Mid-server-4xqPW-05_LJ71QcAQ7gM4Gaj', 'production' => false);
	$ci->load->library('midtrans');
	$ci->midtrans->config($params);
	$notif = $ci->midtrans->status($id);
	return $notif;
}
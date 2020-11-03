<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif_pusher
{
    public function notif($message, $role) {
        $CI =& get_instance();
        $CI->load->view('vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '257973ebdd8b5e5bd54e',
            '3101b3647c1ff82c13a3',
            '866884',
            $options
        );
        $data['message'] = $message;
        $pusher->trigger($role, 'my-event', $data);
    }
}
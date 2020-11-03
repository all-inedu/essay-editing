<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail_smtp
{
    // SSL
    public function smtp()
    {
        $config = [
            'protocol' => 'mail',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'all-inedu.com',
            'smtp_user' => 'essay@all-inedu.com',
            'smtp_pass' => 'essay-editing',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];
        
        return $config;
    }

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail_smtp
{
    // SSL
    public function smtp()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'all.in.eduspace@gmail.com',
            'smtp_pass' => 'bwhlsupvcrqxhttj',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];
        
        return $config;
    }

}
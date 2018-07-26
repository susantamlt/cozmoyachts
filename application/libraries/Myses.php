<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MySes
{
    public function __construct()
    {
        require_once APPPATH.'third_party/ses.php';
    }
}
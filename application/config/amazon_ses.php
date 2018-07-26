<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Config for the Amazon Simple Email Service library
 *
 * @see ../libraries/Amazon_ses.php
 */
// Amazon credentials
$config['amazon_ses_secret_key'] = 'AKIAI3G3U6XK4QQWUXPA';
$config['amazon_ses_access_key'] = 'AsFKoHpRJFmQ6341CyrhgNIj2mUNwr0kEjo6OU+bK49l';

// Adresses
$config['amazon_ses_from'] = 'anupam.roy@mindtechlabs.com';
$config['amazon_ses_from_name'] = 'Constructions Bay';
$config['amazon_ses_reply_to'] = 'gopi.panguluri@mindtechlabs.com';

// Path to certificate to verify SSL connection (i.e. 'certs/cacert.pem') 
$config['amazon_ses_cert_path'] = 'config/Anupam.pem';

// Charset to be used, for example UTF-8, ISO-8859-1 or Shift_JIS. The SMTP
// protocol uses 7-bit ASCII by default
$config['amazon_ses_charset'] = 'UTF-8';

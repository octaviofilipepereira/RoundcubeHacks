// ----------------------------------
// IMAP - Permited Remote Servers
// ----------------------------------
// The IMAP hosts that are permited to perform the log-in.

// Roundcube Hack 2020-01-14
// Octavio Filipe Goncalves
// Create array available_hosts in config
$config['available_hosts'] = array(
    'mail.test0.com',
    'mail.test1.com',
    'mail.test2.com',
);

// Show login button if IMAP host doesn't exist in array
// Supported replacement variables:
// 0 - don't show the login button
// 1 - Show the login button disabled
$config['show_login_button'] = '0';

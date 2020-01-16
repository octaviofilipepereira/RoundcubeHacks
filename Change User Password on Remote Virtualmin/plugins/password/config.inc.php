// Password Plugin options
// -----------------------
// Change this value to virtualmin_remote, so you can load the correct driver
$config['password_driver'] = 'virtualmin_remote';

// Add this code in the bottom of the config file
// VIRTUALMIN_REMOTE Driver options [Only for "virtualmin_remote" driver]
// Define the user that have admin rights in remote Webmin / Virtualmin servers (Usually: root)
$config['vminruser'] = '';
// Define your Webmin / Virtualmin port (Usually: 10000)
$config['vminrport'] = '';
// Define your AES key to decrypt Webmin / Virtualmin admin user password
$config['virtualmin_DB_AES_key'] = '';

<?php
/**
 * Remote Virtualmin Password Driver
 *
 * Driver that adds functionality to change the users Virtualmin password, in remote server, using Virtualmin API.
 *
 * IMPORTANT :: Limitations and Security
 * - By design the Virtualmin API needs the root user to perform these actions.
 * - This is a limitation in my opinion, of the Virtualmin API itself.
 * - To increase the security, i've create a database table, where the Admin can store
 *   the root password of each permited server. The password is stored in AES Encryption,
 *   and you must define the AES Decryption Key, so you can read it, to connect to your
 *   Virtualmin remote server.
 * - The AES Decryption Key, Connection User (by default: root), Virtualmin Port (by default: 10000)
 *   must be declared in the variables $config['remote_virtualmin_aeskey'], $config['vminruser']
 *   and $config['vminrport'], located in plugins/password/config,inc.php
 *
 * @version 1.0
 * @author Octávio Filipe Gonçalves
 *
 * Copyright 2020 MagicBrain at http://www.magicbrain.pt
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses/.
 */

class rcube_virtualmin_remote_password
{
    function save($currpass,$newpass, $username)
    {
        $rcmail = rcmail::get_instance();

        // Load needed variables from config.in.php in plugins/password/
        $vminruser = $rcmail->config->get('vminruser');
        $vminrport = $rcmail->config->get('vminrport');
        $vdbaeskey = $rcmail->config->get('virtualmin_DB_AES_key');

        // Load imap_host in session
	      $user_host = $_SESSION['imap_host'];

        // Define needed dada to remote database and auth table Access
        // This database and table is where you'll store the root password for all remote Virtualmin Servers where the webmail will connect
        // Server Database Host
        $serverdbhost = "";
        // Server Database User
        $serverdbuser = "";
        // Server Database Password
        $serverdbpass = "";
        // Server Database Name
        $serverdbname = "";
        // Server Database Table
        $serverdbtable = "";

        // Create a PDO connection
        $pdo = new PDO("mysql:host=$serverdbhost;dbname=$serverdbname", $serverdbuser, $serverdbpass);

        // Declare the SQL statement
        // rhosts_uhost => The imap server used in login
        // rhosts_vhost => The host that correspond to ima server and is the real vhost configured in remore virtualmin_remote
        // rhosts_auth => Where is stored the root encrypted (AES) password of the remote Virtualmin server.
        // vdbaeskey => Your decryption key, declared in config.in.php of plugins/password/
        $sql = "SELECT rhosts_vhost AS vmin_rdomain, AES_DECRYPT(rhosts_auth, '$vdbaeskey') AS vmin_rpassword FROM $serverdbtable WHERE rhosts_uhost = '$user_host'";

        // Execute the query and load needed values
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        while ($r = $q->fetch()):
        	$vmin_rpassword = $r['vmin_rpassword'];
          $vmin_rdomain = $r['vmin_rdomain'];
        endwhile;

        // Connect remote Virtualmin server and change users email password
        $vmin_connect = shell_exec("wget -O - --quiet --http-user=".$vminruser." --http-passwd=".$vmin_rpassword." --no-check-certificate 'https://".$user_host.":".$vminrport."/virtual-server/remote.cgi?program=modify-user&domain=".$vmin_rdomain."&user=".$username."&pass=".urlencode($newpass)."'");

        /**
        * Debug VIRTUALMIN API Connection, to see what's happening
        * echo "<pre>$vmin_connect</pre>";
        */
    }
}

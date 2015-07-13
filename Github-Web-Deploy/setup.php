<?php
include 'config.php';
echo "<pre>"; 

$current_key = shell_exec('cat '.$ssh_key_path.$ssh_pubkey_name);
if ( !$current_key ) {
	$output = shell_exec( 'cd '.$ssh_key_path.' && ssh-keygen -t rsa -C "'.$git_key_email.'" -N "" -f '.$ssh_key_name.' 2>&1' );

	$output .= "\n Refresh to see the public key for use in GitHub.";
} else {
	$output = $current_key;
}
//$output = shell_exec('./gitsetup.sh 2>&1');
//$output = shell_exec('ls -l');
echo $output;
echo "</pre>";
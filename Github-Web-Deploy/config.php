<?php

#MUST BE A NON-WEB ACCESSIBLE LOCATION!!!!
$ssh_key_path = '../../'; #usually ~/.ssh/
$ssh_pubkey_name = 'id_rsa.pub'; #usually id_rsa.pub
$ssh_key_name = 'id_rsa'; #usually id_rsa

#SSH PATH USED TO CLONE YOUR REPO
#LOOKS LIKE: 'git@github.com:peteramayer/WP-PMA-Boilerplate.git'
$repo_clone_path = 'git@github.com:peteramayer/WP-PMA-Boilerplate.git';

#REPO BRANCH NAME
#May look like: 'master'
$repo_branch_name = 'master';
$git_key_email = 'server@peteramayer.com';

if ( !$ssh_key_path || !$ssh_pubkey_name || !$ssh_key_name || !$repo_clone_path || !$repo_branch_name ) {
	echo "CONFIGURE YOUR REPO INSIDE config.php FIRST!";
	die();
}

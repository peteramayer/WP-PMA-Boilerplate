<?php 
include 'config.php';

$payload = $_REQUEST['payload'];
$force = $_REQUEST['force'];
$logso = "\n";

if ( !$force && !$payload ) {
	$output = shell_exec('git log --name-status HEAD^..HEAD');
	echo "<pre>"; 
	echo "\n\n If you're trying to manually update, you'll need to add ?force=1 to the URL \n\n\n ";
	echo $output;
	echo "</pre>";
	exit(0);
}
if ( !!$payload ) {
	$payload = json_decode( $payload, TRUE );
	//log the request
	$logso .= "deployed at ".date('Y-m-d h:m:s') . ' -- with payload: ';
	$logso .= "\n". $payload['head_commit']['message'];
	$logso .= "\n". $payload['head_commit']['timestamp'];
}

$fetch_commands = array(
	'cd ..',
	'eval `ssh-agent -k`',
	'eval `ssh-agent -s`',
	'ssh-add '.$ssh_key_path.$ssh_key_name,
	'git fetch --all ',
	'git reset --hard origin/'.$repo_branch_name,
	'eval `ssh-agent -k`'
);

$join_commands = implode(" 2>&1; ", $fetch_commands);
echo $join_commands;

//$fetch = shell_exec('chmod 755 ./gitfetch.sh && ./gitfetch.sh '.$ssh_key_path.$ssh_key_name.' '.$repo_branch_name.' 2>&1');
$fetch = shell_exec($join_commands);

$output = shell_exec('git log --name-status HEAD^..HEAD');

echo "<pre> \n\n".$fetch."\n\n </pre>";

$logso .= "\n" . $output;
file_put_contents('logs/github.txt', print_r($logso, TRUE) );

//print_r($logso); 
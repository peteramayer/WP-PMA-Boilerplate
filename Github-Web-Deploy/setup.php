<?php
$output = shell_exec('./gitsetup.sh 2>&1');
echo "<pre>"; 
echo $output;
echo "</pre>";
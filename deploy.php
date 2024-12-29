<?php

// $secret = 'your-secret-key';
// $signature = 'sha1=' . hash_hmac('sha1', file_get_contents('php://input'), $secret);
// if ($_SERVER['HTTP_X_HUB_SIGNATURE'] !== $signature) {
//     http_response_code(403);
//     die('Unauthorized');
// }

// $output = shell_exec('cd /public_html/goapi.qordinate.com/tes_serv && git pull origin main 2>&1');
// echo "<pre>$output</pre>";

// echo shell_exec('whoami');

// print_r(ini_get('disable_functions'));


// // $dir = '/public_html/goapi.qordinate.com/tes_serv';
// $dir = '/www/wwwroot/merantiapi.qordinate.com/tes_serv';
// $command = "cd $dir && git pull origin main 2>&1";
// $output = shell_exec($command);

// if (!$output) {
//     echo "Error: shell_exec returned no output. Possible issues:";
//     echo "<ul>";
//     echo "<li>shell_exec may be disabled on your server.</li>";
//     echo "<li>Path to Git might be incorrect or Git is not installed.</li>";
//     echo "<li>Directory permissions might be misconfigured.</li>";
//     echo "</ul>";
// } else {
//     echo "<pre>$output</pre>";
// }

// echo shell_exec('whoami');



// $secret = 'mauikanBakarGa1';
// $signature = 'sha1=' . hash_hmac('sha1', file_get_contents('php://input'), $secret);
// if ($_SERVER['HTTP_X_HUB_SIGNATURE'] !== $signature) {
//     http_response_code(403);
//     die('Unauthorized');
// }

$output = shell_exec('cd /www/wwwroot/merantiapi.qordinate.com/tes_serv && git pull origin main 2>&1');
echo "<pre>$output</pre>";




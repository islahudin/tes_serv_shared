<?php

// echo shell_exec('whoami');

// echo shell_exec('which git');

// $arr1 = null;

// Secret Token dari GitHub (Opsional)
$secret = 'IkanProject@17';

// Ambil payload dari GitHub
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

// Validasi Signature
if ($secret && $signature) {
    $hash = 'sha1=' . hash_hmac('sha1', $payload, $secret);
    if (!hash_equals($hash, $signature)) {
        http_response_code(403);
        die('Invalid signature');
    }
}

// Jalankan perintah Git
// shell_exec('cd /www/wwwroot/merantiapi.qordinate.com/api_meranti_expose && git pull origin main');
// shell_exec('cd /www/wwwroot/merantiapi.qordinate.com/tes_serv && git fetch origin main && git reset --hard origin/main');
// $output = shell_exec('git config --global --add safe.directory /www/wwwroot/merantiapi.qordinate.com/tes_serv && cd /www/wwwroot/merantiapi.qordinate.com/tes_serv && git pull origin main 2>&1');
$output = shell_exec('cd /public_html/goapi.qordinate.com/tes_serv_shared && git pull origin main 2>&1');
echo "<pre>$output</pre>";


http_response_code(200);

// $arr1[] = array(
//     "message_gan" => "seuccess push server"
// );


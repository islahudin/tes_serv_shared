<?php
// Log aktivitas
// file_put_contents('webhook.log', date('Y-m-d H:i:s') . " - Webhook triggered\n", FILE_APPEND);

// Detail FTP
$ftp_host = '217.21.72.73';
$ftp_user = 'n1577716';
$ftp_pass = 'MenaraQ#20231';
$ftp_path = '/public_html/goapi.qordinate.com/tes_serv_shared'; // Path folder proyek di server

// Detail repository
$repo_url = 'https://github.com/islahudin/tes_serv_shared/archive/refs/heads/main.zip';
$temp_file = 'repo.zip';

// Download zip dari repository
file_put_contents($temp_file, fopen($repo_url, 'r'));

// Ekstrak zip
$zip = new ZipArchive();
if ($zip->open($temp_file) === true) {
    $zip->extractTo('temp_repo');
    $zip->close();
    unlink($temp_file);
} else {
    exit('Failed to extract repository.');
}

// Koneksi ke server FTP
$conn = ftp_connect($ftp_host);
if (!$conn || !ftp_login($conn, $ftp_user, $ftp_pass)) {
    exit('Failed to connect to FTP server.');
}
ftp_pasv($conn, true);

// Unggah file ke server
$local_dir = 'temp_repo/tes_serv_shared-main'; // Path setelah ekstraksi
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($local_dir));

foreach ($files as $file) {
    if ($file->isDir())
        continue;

    $remote_file = $ftp_path . str_replace($local_dir, '', $file->getPathname());
    ftp_mkdir($conn, dirname($remote_file)); // Buat folder jika belum ada
    ftp_put($conn, $remote_file, $file->getPathname(), FTP_BINARY);
}

// Tutup koneksi
ftp_close($conn);

// Hapus folder sementara
array_map('unlink', glob("$local_dir/*"));
rmdir('temp_repo');

echo "Deployment successful.";
?>
<?php
require_once 'vendor/autoload.php';

use Cz\Git\GitRepository;

// Path ke folder proyek
$repoPath = '/public_html/goapi.qordinate.com/tes_serv_shared';

try {
    // Buka repository
    $repo = new GitRepository($repoPath);

    // Tarik pembaruan dari branch utama
    $repo->pull('origin', 'main');

    echo "Deployment successful.";
} catch (Exception $e) {
    // file_put_contents('webhook.log', $e->getMessage(), FILE_APPEND);
    exit('Deployment failed: ' . $e->getMessage());
}
?>
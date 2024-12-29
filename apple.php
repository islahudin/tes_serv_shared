<?php


$output = shell_exec('cd /public_html/goapi.qordinate.com/tes_serv_shared && git pull origin main 2>&1');
echo "<pre>$output</pre>";


<?php

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$sql = <<<EOF
DROP TABLE IF EXISTS pre_singcere_sign_log;
DROP TABLE IF EXISTS pre_singcere_sign_count;
DROP TABLE IF EXISTS pre_singcere_sign_gift;
EOF;


runquery($sql);

$finish = TRUE;
<?php

$connect = C::t('common_setting')->fetch('connect', true);

$connect['oauth2'] = 1;

C::t('common_setting')->update('connect', serialize($connect));

include_once libfile('function/cache');
updatecache('setting');

showmessage('Switch oAuth to oAuth2', $_G['siteurl']);

?>
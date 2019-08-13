<?php
// Please change file name (and maybe script logic) when you publish this on production

// change-domain.php?new_domain=https%3A%2F%2Fwww.google.com
// Make sure file domain.txt is writable
if(empty($_REQUEST['new_domain'])) exit("Fail");

if(strlen($_REQUEST['new_domain']) > 50) exit("Too long");

file_put_contents("domain.txt", $_REQUEST['new_domain']);
echo "OK";
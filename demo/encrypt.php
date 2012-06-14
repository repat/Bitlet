<?php
 
$key = 'bitlet1243';
$string = '524543'; // note the spaces
 
$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, md5($key), $string, MCRYPT_MODE_CBC, substr(md5($key), 0, 4)));
$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, substr(md5($key), 0, 4)), "\0");
 
echo 'Encrypted:' . "\n";
var_dump($encrypted);
 
echo "\n";
 
echo 'Decrypted:' . "\n";
var_dump($decrypted); // spaces are preserved
 
?>

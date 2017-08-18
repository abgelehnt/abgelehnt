<?php
// Php File
//  Filename: des.php
//   Created: 2017-08-17 21:48:08
//      Desc: TODO (some description)
//    Author: abgelehnt, abgelehnt@foxmail.com
//   Company: Chi-Chill Company


$key = "This is a very secret key.oooooo";//密钥 必须是32或16或8位的
$text = "Mhgjhgjh";//需要加密的内容
echo $text . "\n";


$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB) or die("Unable to encrypt\n");
$crypttext = base64_encode($crypttext);
echo $crypttext . "\n";//加密后的内容


//解密内容
echo mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($crypttext), MCRYPT_MODE_ECB) . "\n";




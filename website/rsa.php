<?php
// Php File
//  Filename: rsa.php
//   Created: 2017-08-11 06:01:31
//      Desc: TODO (some description)
//    Author: abgelehnt, abgelehnt@foxmail.com
//   Company: Chi-Chill Company



//读取公钥
$paths = "./rsa_public";
$handle = fopen("$paths", 'r') or die("Unable to open file!\n");

$public_key = fread($handle, filesize("rsa_public"));

fclose($handle);

//读取私钥
$paths = "./rsa_private";
$handle = fopen("$paths", 'r') or die("Unable to open file!\n");

$private_key = fread($handle, filesize("rsa_private"));

fclose($handle);



//判断公钥是否可用
$pub_handle = openssl_pkey_get_public($public_key) or die("Not an avilable public key.\n");

//判断私钥是否可用
$pri_handle = openssl_pkey_get_private($private_key) or die("Not an available prvate key.\n");




//私钥加密
$data = "退休";
openssl_private_encrypt($data, $encrypted, $pri_handle);
$encrypted = base64_encode($encrypted);//base64:使用url安全的字符串

echo $encrypted . "\n";

//解密
openssl_public_decrypt(base64_decode($encrypted), $decrypted, $pub_handle);

echo $decrypted . "\n";



//公钥加密
$data = "加密";
openssl_public_encrypt($data, $encrypted, $pub_handle);
$encrypted = base64_encode($encrypted);

echo $encrypted . "\n";

//解密
openssl_private_decrypt(base64_decode($encrypted), $decrypted, $pri_handle);
echo $decrypted . "\n";





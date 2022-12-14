<?php
    $file = fopen("./contactlist.json","r");
    $data = fread($file,filesize("./contactlist.json"));
    fclose($file);
    $key = "Hotdog";
    $cipher_alog = "aes-256-gcm";
    $ivlen = openssl_cipher_iv_length($cipher_alog); //get the length of the algorithm key
    $iv = openssl_random_pseudo_bytes($ivlen); //use the length of the key to generate a pseudo random number with same length
    $enc_text = openssl_encrypt($data,$cipher_alog,$key,0,$iv,$tag);
    $ivdata = [$iv,$tag];
    $file = fopen("./ivs.dat","w");
    fwrite($file,implode(",",$ivdata));
    fclose($file);
    $file = fopen("./contactlist.json","w");
    fwrite($file,$enc_text);
    fclose($file);
    echo "<p>$enc_text</p>";
    $dec_text = openssl_decrypt($enc_text,$cipher_alog,$key,0,$iv,$tag);
    echo "<p>$tag</p>";
    echo "<p>$dec_text</p>";
?>
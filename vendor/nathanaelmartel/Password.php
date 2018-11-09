<?php

namespace simplementWeb;

class Password {

    public function generate($length = 15, $strength = 2)
    {
        $vowels = 'aeuy';
        $consonants = 'bdghjmnpqrstvz';

        if ($strength > 0) {
            $consonants .= strtoupper($consonants);
            $vowels .= strtoupper($vowels);
        }

        if ($strength > 1) {
            $vowels .= '23456789';
        }

        if ($strength > 2) {
            $vowels .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[hexdec(bin2hex(openssl_random_pseudo_bytes(5))) % strlen($consonants)-1];
                $alt = 0;
            } else {
                $password .= $vowels[hexdec(bin2hex(openssl_random_pseudo_bytes(5))) % strlen($vowels)-1];
                $alt = 1;
            }
        }

        return $password;
    }
}

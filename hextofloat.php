<?php

function hexToFloat32($input) {
    $input = hexdec($input);
    $sign = ($input >> 31) & 0x1;
    $manEnc  = ($input) & 0x7FFFFF;
    $exp = (($input >> 23) & 0xFF) - 0x7F;
    $manDec = 1.0;
    for ($i = 22; $i >= 0; $i--) {
        $manDec += pow(2, -(23 - $i)) * (($manEnc >> $i) & 0x1);
    }
    $result = pow(-1, $sign) * pow(2, $exp) * $manDec;
    return $result;
}

function hexToFloat64($input) {
    $input = hexdec($input);
    $sign = ($input >> 63) & 0x1;
    $manEnc  = ($input) & 0xFFFFFFFFFFFFF;
    $exp = (($input >> 52) & 0x7FF) - 0x3FF;
    $manDec = 1.0;
    for ($i = 51; $i >= 0; $i--) {
        $manDec += pow(2, -(52 - $i)) * (($manEnc >> $i) & 0x1);
    }
    $result = pow(-1, $sign) * pow(2, $exp) * $manDec;
    return $result;
}

?>
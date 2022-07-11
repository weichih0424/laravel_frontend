<?php

namespace App\Services;

class MorseService
{
    /**
     * @var array 摩斯默认配置
     */
    protected static $option = [
        'space'=> '/',
        'short'=> '.',
        'long'=> '-'
    ];

    /**
     * @var array 摩斯密码转换
     */
    protected static $standard = [
        'A' => '01',
        'B' => '1000',
        'C' => '1010',
        'D' => '100',
        'E' => '0',
        'F' => '0010',
        'G' => '110',
        'H' => '0000',
        'I' => '00',
        'J' => '0111',
        'K' => '101',
        'L' => '0100',
        'M' => '11',
        'N' => '10',
        'O' => '111',
        'P' => '0110',
        'Q' => '1101',
        'R' => '010',
        'S' => '000',
        'T' => '1',
        'U' => '001',
        'V' => '0001',
        'W' => '011',
        'X' => '1001',
        'Y' => '1011',
        'Z' => '1100',
        '0' => '11111',
        '1' => '01111',
        '2' => '00111',
        '3' => '00011',
        '4' => '00001',
        '5' => '00000',
        '6' => '10000',
        '7' => '11000',
        '8' => '11100',
        '9' => '11110',
        '.' => '010101',
        ',' => '110011',
        '?' => '001100',
        '\'' => '011110',
        '!' => '101011',
        '/' => '10010',
        '(' => '10110',
        ')' => '101101',
        '&' => '01000',
        ' =>' => '111000',
        ';' => '101010',
        '=' => '10001',
        '+' => '01010',
        '-' => '100001',
        '_' => '001101',
        '"' => '010010',
        '$' => '0001001',
        '@' => '011010',
    ];

    /**
     * @var null 莫斯转换结果
     */
    protected static $standardReverse = null;

    /**
     * 默认参数配置
     */
    protected static function defaultOption($option = null )
    {
        $option = $option || [];
        return [
            isset($option['space']) ? $option['space'] : self::$option['space'],
            isset($option['short']) ? $option['short'] : self::$option['short'],
            isset($option['long']) ? $option['long'] : self::$option['long']
        ];
    }

    /**
     * 按utf分割字符串
     */
    protected static function mbStrSplit($str)
    {
        $len = 1;
        $start = 0;
        $strlen = mb_strlen($str);
        while ($strlen)
        {
            $array[] = mb_substr($str,$start,$len,"utf8");
            $str = mb_substr($str, $len, $strlen,"utf8");
            $strlen = mb_strlen($str);
        }
        return $array;
    }

    /**
     * Unicode字符转换成utf8字符
     */
    protected static function unicodeToUtf8($unicode_str)
    {
        $utf8_str = '';
        $code = intval(hexdec($unicode_str));
        //这里注意转换出来的code一定得是整形，这样才会正确的按位操作
        $ord_1 = decbin(0xe0 | ($code >> 12));
        $ord_2 = decbin(0x80 | (($code >> 6) & 0x3f));
        $ord_3 = decbin(0x80 | ($code & 0x3f));
        $utf8_str = chr(bindec($ord_1)) . chr(bindec($ord_2)) . chr(bindec($ord_3));
        return $utf8_str;
    }

    protected static function charCodeAt($str, $index)
    {
        $char = mb_substr($str, $index, 1, 'UTF-8');
        if (mb_check_encoding($char, 'UTF-8')) {
            $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
            return hexdec(bin2hex($ret));
        }
        else {
            return null;
        }
    }

    /**
     * 摩斯码转文本
     */
    protected static function morseHexUnicode($mor)
    {
        $mor = bindec($mor);
        if(!$mor) {
            return '';
        } else {
            $mor = dechex ($mor);
        }
        return self::unicodeToUtf8($mor);
    }

    /**
     * unicode转二进制
     */
    public static function unicodeHexMorse($ch)
    {
        $r = [];
        $length = mb_strlen($ch, 'UTF8');
        for($i = 0; $i < $length; $i++) {
            $r[$i] = substr(('00'. dechex(self::charCodeAt($ch,$i))), -4);
        }
        $r = join('',$r);
        return base_convert (hexdec($r), 10, 2);
    }

    /**
     * 加密摩斯电码
     */
    public static function encode($text, $option = null)
    {
        $option = self::defaultOption($option); // 默认参数
        $morse = []; // 最终的 morse 结果
        //删除空格，转大写，分割为数组
        $text = self::mbStrSplit( strtoupper(str_replace(' ', '', $text)));
        foreach($text as $key => $ch) {
            $r = @self::$standard[$ch];
            if(!$r) {
                $r = self::unicodeHexMorse($ch); // 找不到，说明是非标准的字符，使用 unicode。
            }
            $morse[] = str_replace('1', $option[2], str_replace('0', $option[1], $r));
        }
        return join( $option[0], $morse);
    }


    /**
     * 解密摩斯电码
     */
    public static function decode($morse, $option = null)
    {
        if( self::$standardReverse === null) {
            foreach(self::$standard as $key => $value) {
                self::$standardReverse[$value] = $key;
            }
        }
        $option = self::defaultOption($option);
        $msg = [];
        $morse = explode($option[0], $morse); // 分割为数组
        foreach($morse as $key =>$mor) {
            $mor = str_replace(' ', '', $mor);
            $mor = str_replace($option[2], '1', str_replace( $option[1], '0', $mor));
            $r = @self::$standardReverse[$mor];
            if(!$r) {
                $r = self::morseHexUnicode($mor); // 找不到，说明是非标准字符的 morse，使用 unicode 解析方式。
            }
            $msg[] = $r;
        }
        return join( '', $msg);
    }
    // public function get()
    // {   
    //     return "123";
    // }
}

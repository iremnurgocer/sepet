<?php
class EncodingHelper
{
    public static function convertTurkishCharacters($input)
    {
        $turkishCharacters = array(
            'ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü'
        );

        $correspondingCharacters = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�');


        return str_replace($turkishCharacters, $correspondingCharacters, $input);
    }
}
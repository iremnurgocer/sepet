<?php
class EncodingHelper
{
    public static function convertTurkishCharacters($input)
    {
        $turkishCharacters = array(
            'รง', 'ร', 'ฤ', 'ฤ', 'ฤฑ', 'ฤฐ', 'รถ', 'ร–', 'ล', 'ล', 'รผ', 'ร'
        );

        $correspondingCharacters = array('็', 'ว', '๐', 'ะ', 'ý', 'Ý', '๖', 'ึ', 'þ', 'Þ', 'ü', 'Ü');


        return str_replace($turkishCharacters, $correspondingCharacters, $input);
    }
}
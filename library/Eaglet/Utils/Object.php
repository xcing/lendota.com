<?php
class Eaglet_Utils_Object
{
    public static function toArray($obj) {
        $objDump  = print_r($obj, 1);
        $matches =  array();
        preg_match_all('/^\\s+\\[(\\w+):protected\\]/m', $objDump, $matches);
        $output = array();
        foreach ($matches[1] as $property)
        {
            if (substr($property, 0, 1) == '_') {
                $property = substr($property, 1);
            }
            $output[$property] = $obj->$property;
        }
        return $output;
    }
}
<?php


namespace Pmrt\helpers;


class ObjectBuilder
{
    public static function build(object $object, array $attributes)
    {
        $properties = get_object_vars($object);

        foreach ($attributes as $name => $value) {
            if (array_key_exists($name, $properties)) {
                if (class_exists($value))
                    $value = new $value;

                $object->$name = $value;
            }
        }
    }
}
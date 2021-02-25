<?php


namespace App\Services;



use InvalidArgumentException;

class FormatterFactory
{
    protected static $formatters = [
        'csv' => CSVVisitor::class,
        'xml' => XMLVisitor::class,
    ];

    public static function for(string $format)
    {
        $format = strtolower($format);

        if (array_key_exists($format, self::$formatters)) {
            $formatter_class = self::$formatters[$format];
            return $formatter_class;
        }

        throw new InvalidArgumentException("Format {$format} is not supported");
    }
}
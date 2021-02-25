<?php


namespace App\Services;


use http\Exception\InvalidArgumentException;

class Formatter
{
    public function formatAs(array $items, string $format): string
    {
        $format = strtolower($format);

        if ($format === 'csv') {
            $result = (new CSVVistor($items))->execute();
        } elseif ($format === 'xml') {
            $result = (new XMLVisitor($items))->execute();
        } else {
            throw new InvalidArgumentException("Format {$format} is not supported");
        }


        return $result;
    }
}
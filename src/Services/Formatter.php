<?php


namespace App\Services;


use http\Exception\InvalidArgumentException;

class Formatter
{
    public function formatAs(array $items, string $format): string
    {
        $result = '';

        $format = strtolower($format);

        if ($format === 'csv') {
            foreach ($items as $item) {
                $result .= $item->toCSV();
                $result .= "\n";
            }
        } elseif ($format === 'xml') {
            foreach ($items as $item) {
                $result .= $item->toXML();
                $result .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Format {$format} is not supported");
        }


        return $result;
    }
}
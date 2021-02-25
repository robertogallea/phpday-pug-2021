<?php


namespace App\Services;



use InvalidArgumentException;

class Formatter
{
    protected $formatters = [
        'csv' => CSVVistor::class,
        'xml' => XMLVisitor::class,
    ];

    public function formatAs(array $items, string $format): string
    {
        $format = strtolower($format);

        if (array_key_exists($format, $this->formatters)) {
            $formatterClass = $this->formatters[$format];

            return (new $formatterClass($items))->execute();
        }

        throw new InvalidArgumentException("Format {$format} is not supported");
    }
}
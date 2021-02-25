<?php


namespace App\Services;



class Formatter
{

    public function formatAs(array $items, string $format): string
    {
        $formatter = FormatterFactory::for($format);

        $result = (new $formatter($items))->execute();

        return $result;
    }
}
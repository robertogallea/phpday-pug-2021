<?php


namespace App\Services;


use App\Models\Book;
use App\Models\Post;

abstract class Visitor
{
    /**
     * CSVVistor constructor.
     * @param array $items
     */
    public function __construct(public array $items)
    {
    }

    public function execute()
    {
        $result = '';

        foreach ($this->items as $item) {
            $result .= $item->accept($this);

            $result .= "\n";
        }

        return $result;
    }
}
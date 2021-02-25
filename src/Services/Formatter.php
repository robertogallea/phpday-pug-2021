<?php


namespace App\Services;


use App\Models\Book;
use App\Models\Post;
use http\Exception\InvalidArgumentException;

class Formatter
{
    public function formatAs(array $items, string $format): string
    {
        $result = '';

        $format = strtolower($format);

        if ($format === 'csv') {
            foreach ($items as $item) {
                if ($item instanceof Book) {
                    $result .= $this->bookToCSV($item);
                } elseif ($item instanceof Post) {
                    $result .= $this->postToCSV($item);
                }
                $result .= "\n";
            }
        } elseif ($format === 'xml') {
            foreach ($items as $item) {
                if ($item instanceof Book) {
                    $result .= $this->bookToXML($item);
                } elseif ($item instanceof Post) {
                    $result .= $this->postToXML($item);
                }
                $result .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Format {$format} is not supported");
        }


        return $result;
    }

    public function bookToCSV(Book $book): string
    {
        return '"' . $book->title . '","' . $book->author . '",' . $book->year;
    }

    public function bookToXML(Book $book)
    {
        return "<book><title>{$book->title}</title><author>{$book->author}</author><year>{$book->year}</year></book>";
    }

    public function postToCSV(Post $post): string
    {
        return '"' . $post->title . '","' . $post->link . '"';
    }

    public function postToXML(Post $post)
    {
        return "<post><title>{$post->title}</title><link>{$post->link}</link></post>";
    }
}
<?php


namespace Tests\Services;


use App\Models\Book;
use App\Models\Post;
use App\Services\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
    /** @test */
    public function it_can_convert_items_to_csv()
    {
        $a_book = new Book('Refactoring: Improving the Design of Existing Code', 'Martin Fowler', 1999);
        $a_post = new Post('Some cool post', 'http://some-link.com/some-cool-post');
        $items = [
            $a_book,
            $a_post,
        ];

        $formatter = new Formatter();

        $this->assertEquals(
            '"' . $a_book->title . '","' . $a_book->author . '",' . $a_book->year . "\n" .
            '"' . $a_post->title . '","' . $a_post->link . '"' . "\n" ,
            $formatter->formatAs($items, 'csv')
        );
    }

    /** @test */
    public function it_can_convert_items_to_xml()
    {
        $a_book = new Book('Refactoring: Improving the Design of Existing Code', 'Martin Fowler', 1999);
        $a_post = new Post('Some cool post', 'http://some-link.com/some-cool-post');
        $items = [
            $a_book,
            $a_post,
        ];

        $formatter = new Formatter();

        $this->assertEquals(
            "<book><title>{$a_book->title}</title><author>{$a_book->author}</author><year>{$a_book->year}</year></book>" . "\n" .
            "<post><title>{$a_post->title}</title><link>{$a_post->link}</link></post>" . "\n" ,
            $formatter->formatAs($items, 'xml')
        );
    }

}
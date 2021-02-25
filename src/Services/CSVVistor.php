<?php


namespace App\Services;


use App\Models\Book;
use App\Models\Post;

class CSVVistor extends Visitor
{

    public function convertBook(Book $book): string
    {
        return '"' . $book->title . '","' . $book->author . '",' . $book->year;
    }

    public function convertPost(Post $post): string
    {
        return '"' . $post->title . '","' . $post->link . '"';
    }
}
<?php


namespace App\Services;


use App\Models\Book;
use App\Models\Post;

class XMLVisitor extends Visitor
{

    public function convertBook(Book $book)
    {
        return "<book><title>{$book->title}</title><author>{$book->author}</author><year>{$book->year}</year></book>";
    }

    public function convertPost(Post $post)
    {
        return "<post><title>{$post->title}</title><link>{$post->link}</link></post>";
    }
}
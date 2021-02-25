<?php


namespace App\Models;


class Book
{
    use Visitable;

    public function __construct(public string $title, public string $author, public int $year) {}
}
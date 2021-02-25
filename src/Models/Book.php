<?php


namespace App\Models;


class Book
{
    public function __construct(public string $title, public string $author, public int $year) {}


}
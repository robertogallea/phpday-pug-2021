<?php


namespace App\Models;


class Post
{
    use Visitable;

    public function __construct(public string $title, public string $link) {}
}
<?php


namespace App\Models;


class Post
{
    public function __construct(public string $title, public string $link) {}

    public function toCSV(): string
    {
        return '"' . $this->title . '","' . $this->link . '"';
    }

    public function toXML()
    {
        return "<post><title>{$this->title}</title><link>{$this->link}</link></post>";
    }
}
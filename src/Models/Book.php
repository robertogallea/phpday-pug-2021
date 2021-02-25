<?php


namespace App\Models;


class Book
{
    public function __construct(public string $title, public string $author, public int $year) {}

    public function toCSV(): string
    {
        return '"' . $this->title . '","' . $this->author . '",' . $this->year;
    }

    public function toXML()
    {
        return "<book><title>{$this->title}</title><author>{$this->author}</author><year>{$this->year}</year></book>";
    }
}
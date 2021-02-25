<?php


namespace App\Models;


use App\Services\Visitor;

trait Visitable
{
    public function accept(Visitor $visitor)
    {
        $class = new \ReflectionClass($this);
        $className = $class->getShortName();

        return $visitor->{'convert' . $className}($this);
    }
}
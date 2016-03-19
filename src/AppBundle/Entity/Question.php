<?php

namespace AppBundle\Entity;

class Question
{
    public $text;

    public function addResult(Result $result)
    {
        if(!$this->results->contains($result)){
            $this->results->add($result);
        }
    }
}


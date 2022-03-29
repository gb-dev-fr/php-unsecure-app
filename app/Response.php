<?php

namespace App;

class Response implements ResponseInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function send()
    {
        echo $this->content;
    }
}
<?php

namespace App;

class RedirectResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * RedirectResponse constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function send()
    {
        header(sprintf("location: %s", $this->url));
    }
}
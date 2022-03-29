<?php

namespace App;

class JsonResponse implements ResponseInterface
{
    /**
     * @var mixed
     */
    private $data;

    /**
     * JsonResponse constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function send()
    {
        echo json_encode($this->data);
    }
}
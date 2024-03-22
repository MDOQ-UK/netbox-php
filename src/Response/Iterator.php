<?php

namespace mkevenaar\NetBox\Response;

use mkevenaar\NetBox\Api\ApiInterface;

class Iterator implements \Traversable, \Iterator, \Countable
{
    protected $api;

    protected $params;

    protected $position = 0;

    protected $collection = [];

    protected $initialized = false;

    protected $totalItems = 0;

    protected $page = 1;

    protected $pageSize = 50;

    public function __construct(
        ApiInterface $api,
        array $params = []
    ){
        $this->api = $api;
        $this->params = $params;    
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current()
    {
        if(!$this->initialized){
            $this->initialize();
        }
        return $this->collection[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next(): void
    {
        if(!$this->initialized){
            $this->initialize();
        }
        $this->position++;
        if($this->position < $this->totalItems &&  $this->position == count($this->collection)){
            $this->page++;
            $this->loadPage();
        }
    }

    public function valid(): bool
    {
        if(!$this->initialized){
            $this->initialize();
        }
        return isset($this->collection[$this->position]);
    }

    public function count(): int
    {
        if(!$this->initialized){
            $this->initialize();
        }
        return $this->totalItems;
    }

    protected function initialize()
    {
        $this->initialized = true;
        $this->loadPage();
    }

    protected function loadPage()
    {
        $response = $this->api->list(array_merge(
            $this->params,
            [
                'limit' => $this->pageSize,
                'offset' => ($this->page - 1) * $this->pageSize
            ]
        ));

        $this->totalItems = $response['count'];
        array_push(
            $this->collection,
            ...$response['results']
        );
    }
}

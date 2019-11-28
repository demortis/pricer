<?php


namespace Pmrt\components;


use Pmrt\helpers\ObjectBuilder;

class GoodDescriptor implements \Pmrt\interfaces\GoodDescriptor
{
    public $url;

    public $xpath;

    public function __construct(array $config)
    {
        ObjectBuilder::build($this, $config);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getXPath(): string
    {
        return $this->xpath;
    }
}
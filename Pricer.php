<?php


namespace Pmrt;


use Pmrt\helpers\ObjectBuilder;
use Pmrt\interfaces\GoodDescriptor;

class Pricer
{
    public $transport;

    public $parser;

    private $descriptor;

    public function __construct(GoodDescriptor $descriptor)
    {
        $config = require 'config/config.php';

        ObjectBuilder::build($this, $config);

        $this->descriptor = $descriptor;
    }

    public function init(): void
    {
        $page = $this->transport->getPage($this->descriptor->getUrl());

        $this->parser->parse($page, $this->descriptor->getXPath());
    }

    public function getPrice(): int
    {
        return $this->parser->getPrice();
    }
}
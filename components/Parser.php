<?php

namespace Pmrt\components;

use Pmrt\helpers\Price;

class Parser
{
    private $price;

    public function parse(string $page, $xpath): void
    {
        libxml_use_internal_errors(true);

        $document = new \DOMDocument('1.0', 'UTF-8');
        $document->loadHTML($page);
        $domXPath = new \DOMXPath($document);
        $elements = $domXPath->query($xpath);
        $this->price = $elements[0]->nodeValue;
    }

    public function getPrice(): int
    {
        return Price::clean($this->price);
    }
}
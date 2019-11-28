<?php

namespace Pmrt\interfaces;

interface Transport
{
    public function getPage(string $url): string;
}
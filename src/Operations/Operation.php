<?php

namespace Kata\Operations;

interface Operation
{
    public function getTitle(): string;

    public function execute();
}

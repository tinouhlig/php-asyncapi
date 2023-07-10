<?php

namespace TinoUhlig\AsyncApiBundle\Attribute;

use Attribute;

#[Attribute]
class Property
{
    public function __construct(
        public ?string $name = null
    ) {
    }
}

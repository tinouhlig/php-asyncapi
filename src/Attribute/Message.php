<?php

namespace TinoUhlig\AsyncApiBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Message
{
    public function __construct(
        public ?string $channel
    ) {
    }
}

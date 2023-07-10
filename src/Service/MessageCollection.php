<?php

namespace TinoUhlig\AsyncApiBundle\Service;

class MessageCollection
{
    public function __construct(
        private iterable $messages
    ) {
    }

    public function getMessages(): iterable
    {
        return $this->messages;
    }
}

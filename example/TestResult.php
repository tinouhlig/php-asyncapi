<?php

namespace TinoUhlig\AsyncApiBundle\Example;

use TinoUhlig\AsyncApiBundle\Attribute\Message;
use TinoUhlig\AsyncApiBundle\Attribute\Property;

#[Message]
class TestResult
{
    public function __construct(
        #[Property]
        private bool $success,
        #[Property]
        private string $message,
    ) {
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}

<?php

namespace TinoUhlig\AsyncApiBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use TinoUhlig\AsyncApiBundle\DependencyInjection\AsyncApiExtension;

class TinoUhligAsyncApiBundle extends AbstractBundle
{
    public function getContainerExtension(): AsyncApiExtension
    {
        return new AsyncApiExtension();
    }
}

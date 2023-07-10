<?php

namespace TinoUhlig\AsyncApiBundle\Service\Factory;

class AsyncApiFactory
{
    public function __construct(
        private string $version,
        private ChannelsFactory $channelsFactory,
    ) {
    }

    public function getAsyncApi(): array
    {
        $spec = [
            'asyncapi' => $this->version,
            'id' => 'urn:playgroud', // @TODO make dynamic via external config
            'info' => [
                'title' => 'playground', // required
                'version' => '1.1.0', //required
                'description' => 'asdasdas',
                'termsOfService' => 'adsadsas',
                'contact' => [
                    'name' => 'Tino',
                    'url' => 'https://power.cloud',
                    'email' => 'mail@tino.org',
                ],
                'license' => [
                    'name' => 'MIT',
                    'url' => 'https://opensource.org/license/mit/',
                ],
            ],
            'defaultContentType' => 'application/json',
            'channels' => $this->channelsFactory->getChannels(),
        ];

        return $spec;
    }
}

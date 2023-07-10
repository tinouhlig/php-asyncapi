<?php

namespace TinoUhlig\AsyncApiBundle\Service\Factory;

use TinoUhlig\AsyncApiBundle\Service\MessageCollection;

class ChannelsFactory
{
    public function __construct(
        private MessageCollection $messageCollection
    ) {
    }

    public function getChannels(): array
    {
        return $this->createChannels();
    }

    private function createChannels(): array
    {
        $channels = [];
        foreach ($this->messageCollection->getMessages() as $message) {
            $channel = $message->getChannel();
            $channels[$channel->getChannelIdentifier()] = [
                'description' => $channel->getDescription(),
                'servers' => $channel->getServers(),
                'subscribe' => $channel->getSubscriptionSpecification(),
                'publish' => $channel->getPublishSpecification(),
                'parameters' => $channel->getParameters(),
                'bindings' => $channel->getBindings(),
            ];
        }

        return $channels;
    }
}

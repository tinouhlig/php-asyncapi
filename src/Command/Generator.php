<?php

namespace TinoUhlig\AsyncApiBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use TinoUhlig\AsyncApiBundle\Service\Factory\AsyncApiFactory;
use TinoUhlig\AsyncApiBundle\Service\MessageCollection;

#[AsCommand(name: 'asyncapi:generate')]
class Generator extends Command
{
    public function __construct(
        private MessageCollection $classCollector,
        private Filesystem $filesystem,
        private AsyncApiFactory $factory,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach ($this->classCollector->getMessages() as $message) {
            $output->writeln(get_class($message));
        }

        $schema = $this->factory->getAsyncApi();

        $content = Yaml::dump($schema);

        $this->filesystem->dumpFile('test.yaml', $content);

        $output->writeln(['', '<fg=green>Done! ✨</>']);

         return Command::SUCCESS;
    }
}

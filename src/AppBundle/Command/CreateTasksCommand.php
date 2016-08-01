<?php
/**
 * Created by mcfedr on 7/29/16 16:45
 */
namespace AppBundle\Command;

use Mcfedr\QueueManagerBundle\Manager\QueueManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTasksCommand extends Command
{
    /**
     * @var QueueManagerRegistry
     */
    private $queueRegistry;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param QueueManagerRegistry $queueRegistry
     */
    public function __construct(QueueManagerRegistry $queueRegistry, LoggerInterface $logger)
    {
        parent::__construct('create-tasks');
        $this->queueRegistry = $queueRegistry;
        $this->logger = $logger;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while(true) {
            switch (rand(0, 4)) {
                case 0:
                    $this->queueRegistry->put('task_worker', [], [], 'sqs');
                    $this->logger->info('Added sqs task');
                    break;
                case 1:
                    $this->queueRegistry->put('task_worker', [], [
                        'time' => new \DateTime('+10 seconds')
                    ], 'delay');
                    $this->logger->info('Added delay task');
                    break;
                case 2:
                    $this->queueRegistry->put('task_worker', [], [], 'beanstalk');
                    $this->logger->info('Added beanstalk task');
                    break;
                case 3:
                    $this->queueRegistry->put('task_worker', [], [], 'resque');
                    $this->logger->info('Added resque task');
                    break;
                default:
                    sleep(5);
            }
        }
    }

}

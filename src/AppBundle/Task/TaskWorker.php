<?php
/**
 * Created by mcfedr on 7/29/16 16:49
 */
namespace AppBundle\Task;

use Mcfedr\QueueManagerBundle\Exception\UnrecoverableJobException;
use Mcfedr\QueueManagerBundle\Queue\Worker;
use Psr\Log\LoggerInterface;

class TaskWorker implements Worker
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Called to start the queued task
     *
     * @param array $arguments
     * @throws \Exception
     * @throws UnrecoverableJobException This job should not be retried
     */
    public function execute(array $arguments)
    {
        $this->logger->info('Executed task', [
            'arguments' => $arguments
        ]);
    }
}

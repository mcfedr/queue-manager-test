<?php
/**
 * Created by mcfedr on 7/29/16 16:49
 */
namespace AppBundle\Task;

use AppBundle\Entity\Something;
use Doctrine\Bundle\DoctrineBundle\Registry;
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
     * @var Registry
     */
    private $doctrine;

    public function __construct(LoggerInterface $logger, Registry $doctrine)
    {
        $this->logger = $logger;
        $this->doctrine = $doctrine;
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

        $s = new Something(null);
        $this->doctrine->getManager()->persist($s);
        $this->doctrine->getManager()->flush();
    }
}

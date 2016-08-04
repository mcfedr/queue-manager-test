<?php
/**
 * Created by mcfedr on 8/4/16 10:39
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Something
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $thing;

    /**
     * @param $thing
     */
    public function __construct($thing)
    {
        $this->thing = $thing;
    }
}

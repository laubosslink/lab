<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="tests")
 * @ORM\Entity
 */
class Test
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


}
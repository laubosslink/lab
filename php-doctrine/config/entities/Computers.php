<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Computers
 *
 * @ORM\Table(name="doctrine_computers")
 * @ORM\Entity
 */
class Computers
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
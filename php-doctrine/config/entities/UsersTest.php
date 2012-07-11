<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UsersTest
 *
 * @ORM\Table(name="doctrine_users_test")
 * @ORM\Entity
 */
class UsersTest
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
     * @var string $username
     *
     * @ORM\Column(name="username", type="string")
     */
    private $username;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Data", mappedBy="user")
     */
    private $datas;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Computers")
     * @ORM\JoinTable(name="doctrine_users_computers",
     *   joinColumns={
     *     @ORM\JoinColumn(name="users", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="computers", referencedColumnName="id")
     *   }
     * )
     */
    private $computers;

    public function __construct()
    {
        $this->datas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}
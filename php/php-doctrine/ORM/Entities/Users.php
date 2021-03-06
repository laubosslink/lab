<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 */
class Users
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $datas;

    public function __construct()
    {
        $this->datas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add datas
     *
     * @param Data $datas
     * @return Users
     */
    public function addData(\Data $datas)
    {
        $this->datas[] = $datas;
        return $this;
    }

    /**
     * Get datas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDatas()
    {
        return $this->datas;
    }
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $computers;


    /**
     * Add computers
     *
     * @param Computers $computers
     * @return Users
     */
    public function addComputers(\Computers $computers)
    {
        $this->computers[] = $computers;
        return $this;
    }

    /**
     * Get computers
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComputers()
    {
        return $this->computers;
    }
    
    /**
     * Computer exist ?
     * 
     * @param Computers $computer
     * @return boolean
     */
     public function computerExist(Computers $computer){
		foreach($this->getComputers() as $computerSearch){
			if($computerSearch == $computer){
				return true;
			}
		}
		
		return false;
	 }
}

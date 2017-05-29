<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * productSoort
 *
 * @ORM\Table(name="productsoort")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\productSoortRepository")
 */
class productSoort
{
    /**
     * @var int
     *
	 * @ORM\Id
     * @ORM\Column(name="tid", type="integer", unique=true, length=11)
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="beschrijving", type="string", length=100)
     */
    private $beschrijving;

	/*
	* @ORM\OneToMany(targetEntity="product", mappedBy="productsoort")
	*/
	private $producten;

	
	/*
	* Constructor voor de variabele $producten.
	*/
	public function __construct(){
		$this->producten = new ArrayCollection();
	}
	
    /**
     * Set tid
     *
     * @param integer $tid
     *
     * @return productSoort
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return productSoort
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }
	
	/**
	*
	* @return string
	*/
	public function __toString()
	{
		return $this->beschrijving;
	}
	
}

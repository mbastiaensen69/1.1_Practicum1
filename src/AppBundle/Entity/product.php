<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class product
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="barcode", type="string", length=20, unique=true)
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="merk", type="string", length=50, nullable=true)
     */
    private $merk;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $inkoopprijs;

    /**
     * @var string
     *
     * @ORM\Column(name="opmerking", type="string", length=255, nullable=true)
     */
    private $opmerking;

    /**
     * @ORM\ManyToOne(targetEntity="productSoort", inversedBy="producten")
     * @ORM\JoinColumn(name="productsoort", referencedColumnName="tid")
     */
    private $productsoort;


    /**
     * Set barcode
     *
     * @param string $barcode
     *
     * @return product
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set naam
     *
     * @param string $naam
     *
     * @return product
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set merk
     *
     * @param string $merk
     *
     * @return product
     */
    public function setMerk($merk)
    {
        $this->merk = $merk;

        return $this;
    }

    /**
     * Get merk
     *
     * @return string
     */
    public function getMerk()
    {
        return $this->merk;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return product
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set opmerking
     *
     * @param string $opmerking
     *
     * @return product
     */
    public function setOpmerking($opmerking)
    {
        $this->opmerking = $opmerking;

        return $this;
    }

    /**
     * Get opmerking
     *
     * @return string
     */
    public function getOpmerking()
    {
        return $this->opmerking;
    }

    /**
     * Set productsoort
     *
     * @param integer $productsoort
     *
     * @return product
     */
    public function setProductsoort($productsoort)
    {
        $this->productsoort = $productsoort;

        return $this;
    }

    /**
     * Get productsoort
     *
     * @return int
     */
    public function getProductsoort()
    {
        return $this->productsoort;
    }
	

}


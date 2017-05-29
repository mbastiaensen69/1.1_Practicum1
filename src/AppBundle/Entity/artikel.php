<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\artikelRepository")
 */
class artikel
{
    /**
     * @var int
     *
	 * @ORM\Column(name="artikelnummer", type="integer", unique=true)
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="string", length=65)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="specificatie", type="string", length=250, nullable=true)
     */
    private $specificatie;

    /**
     * @var string
     *
     * @ORM\Column(name="lokatie", type="string", length=12)
     */
    private $lokatie;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2)
     */
    private $inkoopprijs;

    /**
     * @var int
     *
     * @ORM\Column(name="minVoorraad", type="integer")
     */
    private $minVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="voorraad", type="integer")
     */
    private $voorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    private $bestelserie;

    /**
     * @var int
     *
     * @ORM\Column(name="vervangende_code", type="integer", nullable=true)
     */
    private $vervangendeCode;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return artikel
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set specificatie
     *
     * @param string $specificatie
     *
     * @return artikel
     */
    public function setSpecificatie($specificatie)
    {
        $this->specificatie = $specificatie;

        return $this;
    }

    /**
     * Get specificatie
     *
     * @return string
     */
    public function getSpecificatie()
    {
        return $this->specificatie;
    }

    /**
     * Set lokatie
     *
     * @param string $lokatie
     *
     * @return artikel
     */
    public function setLokatie($lokatie)
    {
        $this->lokatie = $lokatie;

        return $this;
    }

    /**
     * Get lokatie
     *
     * @return string
     */
    public function getLokatie()
    {
        return $this->lokatie;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return artikel
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
     * Set minVoorraad
     *
     * @param integer $minVoorraad
     *
     * @return artikel
     */
    public function setMinVoorraad($minVoorraad)
    {
        $this->minVoorraad = $minVoorraad;

        return $this;
    }

    /**
     * Get minVoorraad
     *
     * @return int
     */
    public function getMinVoorraad()
    {
        return $this->minVoorraad;
    }

    /**
     * Set voorraad
     *
     * @param integer $voorraad
     *
     * @return artikel
     */
    public function setVoorraad($voorraad)
    {
        $this->voorraad = $voorraad;

        return $this;
    }

    /**
     * Get voorraad
     *
     * @return int
     */
    public function getVoorraad()
    {
        return $this->voorraad;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
     *
     * @return artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }

    /**
     * Set vervangendeCode
     *
     * @param integer $vervangendeCode
     *
     * @return artikel
     */
    public function setVervangendeCode($vervangendeCode)
    {
        $this->vervangendeCode = $vervangendeCode;

        return $this;
    }

    /**
     * Get vervangendeCode
     *
     * @return int
     */
    public function getVervangendeCode()
    {
        return $this->vervangendeCode;
    }
}


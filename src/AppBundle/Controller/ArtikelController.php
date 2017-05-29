<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\artikel;
use AppBundle\Form\Type\artikelType;

class ArtikelController extends Controller
{
	/**
	* @Route("/artikelen/alle", name="alle_artikelen")
	*/
	public function alleArtikelen(Request $request) {
		$artikelen = $this->getDoctrine()->getRepository("AppBundle:artikel")->findAll();
		$tekst = "";
		foreach($artikelen as $artikel){
			$tekst = $tekst . $artikel->getArtikelnummer() . " " . 
			$artikel->getOmschrijving() . " " . 
			$artikel->getVoorraad() . " " . 
			$artikel->getLokatie() . "<br />";
		}
		return new Response($tekst);
	}

	/**
	* @Route("/artikel/nummer/{artikelNummer}", name="artikelOpNummer")
	*/
	public function artikelOpNummer(Request $request, $artikelNummer) {
		$artikelen = $this->getDoctrine()->getRepository("AppBundle:artikel")->findByArtikelnummer($artikelNummer);		
		$tekst = "";
		foreach($artikelen as $artikel){
			$tekst = $tekst . $artikel->getArtikelnummer() . " " . 
			$artikel->getOmschrijving() . " " . 
			$artikel->getLokatie() . "<br />";
		}
		return new Response($tekst);
	}

	/**
	* @Route("/artikel/lokatie/{lokatie}", name="artikelenOpLokatie")
	*/
	public function getArtikelOpLokatie (Request $request, $lokatie) {
		$artikelen = $this->getDoctrine()->getRepository("AppBundle:artikel")->findByLokatie($lokatie);		
		$tekst = "";
		foreach($artikelen as $artikel){
			$tekst = $tekst . $artikel->getLokatie() . " " . 
			$artikel->getArtikelnummer() . " " . 
			$artikel->getOmschrijving() . "<br />";
		}
		return new Response($tekst);
	}	
	
	/**
     * @Route("/artikel/nieuw/", name="nieuwArtikel")
     */
	public function nieuwArtikel(Request $request) {
		$nieuwArtikel = new artikel();
		$form = $this->createForm(artikelType::class, $nieuwArtikel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuwArtikel);
			$em->flush();
			return $this->redirect($this->generateUrl('alle_artikelen')); 
		}

		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }


//---- laatste accolade staat hieronder
}

?>
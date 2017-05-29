<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Klant;
use AppBundle\Form\Type\klantType;

class KlantenController extends Controller
{
	/**
	* @Route("/klanten/", name="alle_klanten")
	*/
	public function alleKlanten(Request $request) {
		$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findAll();
// Comments hierna hebben betrekking op het renderen zonder een twig.		
//		$tekst = "";
//		foreach($klanten as $klant){
//			$tekst = $tekst . $klant->getVoornaam() . " " . 
//			$klant->getAchternaam() . " " . 
//			$klant->getKlantnummer() . "<br />";
//		}
//		return new Response($tekst);
		return new Response($this->renderview('klanten.html.twig', array('klanten' => $klanten) ));
	}

	/**
	* @Route("/klanten/voornaam/{voorNaam}", name="KlantenOpVoornaam")
	*/
	public function klantOpVoornaam(Request $request, $voorNaam) {
		$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findByVoornaam($voorNaam);		
// Comments hieronder zijn de eerste opdracht
//		$tekst = "";
//		foreach($klanten as $klant){
//			$tekst = $tekst . $klant->getVoornaam() . " " . 
//			$klant->getAchternaam() . " " . 
//			$klant->getKlantnummer() . "<br />";
//		}
//		return new Response($tekst);
		return new Response($this->renderview('klanten.html.twig', array('klanten' => $klanten) ));
	}

	/**
	* @Route("/klanten/woonplaats/{woonplaats}", name="KlantenOpWoonplaats")
	*/
	public function getKlantOpWoonplaats (Request $request, $woonplaats) {
		$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findByWoonplaats($woonplaats);		
// Comments hieronder zijn de eerste opdracht
//		$tekst = "";
//		foreach($klanten as $klant){
//			$tekst = $tekst . $klant->getVoornaam() . " " . 
//			$klant->getAchternaam() . " " . 
//			$klant->getKlantnummer() . "<br />";
//		}
//		return new Response($tekst);
		return new Response($this->renderview('klanten.html.twig', array('klanten' => $klanten) ));
	}	
	
	/**
     * @Route("/klant/nieuw/", name="nieuweklant")
     */
	public function nieuweKlant(Request $request) {
		$nieuweKlant = new Klant();
		$form = $this->createForm(klantType::class, $nieuweKlant);

		// Generieke code
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweKlant);
			$em->flush();
			return $this->redirect($this->generateUrl('alle_klanten')); 
			// let op de punt na generateUrl, die staat er niet
		}
		return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
    }

	/**
     * @Route("/klant/wijzig/{klantnummer}", name="wijzigenklant")
     */
	public function wijzigKlant(Request $request, $klantnummer) {
		$bestaandeKlant = $this->getDoctrine()->getRepository("AppBundle:Klant")->find($klantnummer); 
		$form = $this->createForm(klantType::class, $bestaandeKlant);

		// Generieke code
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandeKlant);
			$em->flush();
			return $this->redirect($this->generateUrl('alle_klanten')); 
		}
		return new Response($this->renderview('form.html.twig', array('form' => $form->createView())));
    }

	/**
     * @Route("/klant/verwijder/{klantnummer}", name="verwijderenklant")
     */
	public function verwijderKlant(Request $request, $klantnummer) {
		$em = $this->getDoctrine()->getManager();
		$teVerwijderenKlant = $em->getRepository("AppBundle:Klant")->find($klantnummer);	
		// verwijder de klant op basis van klantnummer
		$em->remove($teVerwijderenKlant); 

		// maak het definitief door het in de DB te committen.
		$em->flush(); 
		
		//return new Response($this->renderview('klanten.html.twig', array('klanten' => $klanten) ));
		return $this->redirect($this->generateUrl("alle_klanten"));
    }

//---- laatste accolade staat hieronder
}
?>
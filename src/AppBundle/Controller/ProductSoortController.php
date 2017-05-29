<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\productSoort;
use AppBundle\Form\Type\productSoortType;

class ProductSoortController extends Controller
{
	/**
	* @Route("/productsoorten", name="alleProductSoorten")
	*/
	public function alleProductSoorten(Request $request) {
		$productSoorten = $this->getDoctrine()->getRepository("AppBundle:productSoort")->findAll();
		$tekst = "";
		foreach($productSoorten as $productsoort){
			$tekst = $tekst . $productsoort->getTid() . " " . 
			$productsoort->getBeschrijving() . "<br />";
		}
		return new Response($tekst);
	}

	/**
     * @Route("/productsoort/nieuw", name="nieuwProductSoort")
     */
	public function nieuwProductSoort(Request $request) {
		$nieuwProductSoort = new productSoort();
		$form = $this->createForm(productSoortType::class, $nieuwProductSoort);

		// Generieke code
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuwProduct);
			$em->flush();
			return $this->redirect($this->generateUrl('alleProductSoorten'));
		}

		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }

	
//---- laatste accolade staat hieronder
}

?>
<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\product;
use AppBundle\Entity\productSoort;
use AppBundle\Form\Type\productType;
use AppBundle\Form\Type\productSoortType;

class ProductController extends Controller
{
	/**
	* @Route("/producten", name="alle_producten")
	*/
	public function alleProducten(Request $request) {
		$producten = $this->getDoctrine()->getRepository("AppBundle:product")->findAll();
		$tekst = "";
		foreach($producten as $product){
			$tekst = $tekst . $product->getBarcode() . " " . 
			$product->getNaam() . " " . 
			$product->getMerk() . " " .
			$product->getProductsoort() . "<br />";
		}
		return new Response($tekst);
	}

	/**
     * @Route("/product/nieuw", name="nieuwProduct")
     */
	public function nieuwProduct(Request $request) {
		$nieuwProduct = new product();
		$form = $this->createForm(productType::class, $nieuwProduct);

		// Generieke code
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuwProduct);
			$em->flush();
			return $this->redirect($this->generateUrl('alle_producten')); 
		}

		return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }

	
//---- laatste accolade staat hieronder
}

?>
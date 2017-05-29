<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * 
 */
class MijnEersteController extends Controller
{
	/**
	* @Route("/hallo/wereld", name="hallo_wereld")
	*/
	public function halloWereld(Request $request) {
		
		return new Response('Hallo wereld, mijn eerste controller!!!');
	}
	
}
?>
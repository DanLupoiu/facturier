<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GeneratorController extends Controller{
    /**
     * @Route("/raspuns/html")
     */
    public function raspunsHtmlAction() {
        $number = rand(0, 100);
        
        return new Response(
                '<html><body>Acesta este numarul generat: ' . $number . '</body></html>'
        );
    }
    
    /**
     * @Route("/raspuns/json/{number}")
     */
    public function raspunsJsonAction($number) {
        $data = array();
        for ($i=1;$i<=$number;$i++){
            $data['numar_generat'.$i] = rand(0, 100);
        }
        return new Respone(
        json_encode($data),
        200, 
        array('Content-Type' => 'application/json')
        );
    }
    
    /**
     * @Route("/raspuns/htmlmvc")
     */
    public function raspunsHtmlMvcAction() {
        $numar = rand(0, 100);
        
        return $this->render(
                'Generator/raspunsHtml.html.twig',
                array('numar' => $numar)
                );
    }
}
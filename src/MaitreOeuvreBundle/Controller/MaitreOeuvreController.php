<?php

namespace MaitreOeuvreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MaitreOeuvreController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Security:login.html.twig');
    }
    public function patronAction()
    {
        $title='Administration patron';
        return $this->render('MaitreOeuvreBundle:MaitreOeuvre:patron_homepage.html.twig',array( 'title' => $title ));
    }
    public function secretaireAction()
    {
        $title='Administration secrétaire';
        return $this->render('MaitreOeuvreBundle:MaitreOeuvre:secretaire_homepage.html.twig',array( 'title' => $title ));
    }
    public function artisanAction()
    {
        $title='Administration artisan';
        return $this->render('MaitreOeuvreBundle:MaitreOeuvre:artisan_homepage.html.twig',array( 'title' => $title ));
    }
    public function clientAction()
    {
        $title='Administration client';
        return $this->render('MaitreOeuvreBundle:MaitreOeuvre:client_homepage.html.twig',array( 'title' => $title ));
    }
}

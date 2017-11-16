<?php

namespace MaitreOeuvreBundle\Controller;

use MaitreOeuvreBundle\Event\MaitreOeuvreEvents;
use MaitreOeuvreBundle\Form\ArtisanEditType;
use MaitreOeuvreBundle\Form\ArtisanConsultType;
use MaitreOeuvreBundle\Form\SecretaireType;
use MaitreOeuvreBundle\Form\SecretaireEditType;
use MaitreOeuvreBundle\Form\ClientConsultType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use MaitreOeuvreBundle\Form\ClientEditType;
use Symfony\Component\Validator\Constraints\Date;
use UserBundle\Entity\User;
use UserBundle\Repository\UserRepository as UserRepository;
use MaitreOeuvreBundle\Form\ClientType;
use MaitreOeuvreBundle\Form\ArtisanType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;


class MembresController extends Controller
{
    /** @var Request The instance of the current Symfony request */
    public $request;
    /** @var array The full configuration of the entire backend */
    protected $config;
    /** @var array The full configuration of the current entity */
    protected $entity = array();

    /** @var EntityManager The Doctrine entity manager for the current entity */
    private $em;


    public function indexAction()
    {
        $title = 'Administration membres';

        $em = $this->getDoctrine()->getManager();
        $listeClients = $em->getRepository('UserBundle:User')->listeMembres('client');
        $listeArtisan = $em->getRepository('UserBundle:User')->listeMembres('artisan');
        $listeSecretaire = $em->getRepository('UserBundle:User')->listeMembres('secretaire');


        return $this->render('MaitreOeuvreBundle:Membres:membres.html.twig', array('title' => $title, 'listeClients' => $listeClients,'listeSecretaire' => $listeSecretaire, 'listeArtisan' => $listeArtisan));
    }

    public function ajoutClientAction(request $request)
    {
        $title = 'Ajout d\'un client';
        $date = new \DateTime('now');

        // création d'une instance Client
        $client = new User();
        //création du formulaireType
        $form = $this->get('form.factory')->create(new ClientType(), $client);
        if ($form->handleRequest($request)->isValid()) {
            $role = array('ROLE_CLIENT');
            $client->setRoles($role);
            $client->setEnabled(1);
            $client->setEmail(null);
            $client->setDateCrea($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', 'Client ajouté avec succès.');

            return $this->redirect($this->generateUrl('index_membres'));
        }


        return $this->render('MaitreOeuvreBundle:Membres:ajout_client.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function ajoutSecretaireAction(request $request)
    {
        $title = 'Ajout d\'une secrétaire';
        $date = new \DateTime('now');

        // création d'une instance Secrétaire
        $secretaire = new User();
        //création du formulaireType
        $form = $this->get('form.factory')->create(new SecretaireType(), $secretaire);
        if ($form->handleRequest($request)->isValid()) {
            $role = array('ROLE_SECRETAIRE');
            $secretaire->setRoles($role);
            $secretaire->setEnabled(1);
            $secretaire->setEmail(null);
            $secretaire->setDateCrea($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($secretaire);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', 'Secrétaire ajouté avec succès.');

            return $this->redirect($this->generateUrl('index_membres'));
        }


        return $this->render('MaitreOeuvreBundle:Membres:ajout_secretaire.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function modifSecretaireAction($id, Request $request)
    {
        $title = 'Modification d\'une secrétaire';
        $date = new \DateTime('now');

        $em = $this->getDoctrine()->getManager();
        $secretaire = $em->getRepository('UserBundle:User')->find($id);
        $password = $secretaire->getPassword();
        $form = $this->get('form.factory')->create(new SecretaireEditType(), $secretaire);
        if ($form->handleRequest($request)->isValid()) {


            if (!empty($form->get('password')->getData())) {
                $secretaire->setPlainPassword($form->get('password')->getData());
            } else {
                $secretaire->setPassword($password);
            }
            $role = array('ROLE_SECRETAIRE');
            $secretaire->setRoles($role);
            $secretaire->setEnabled(1);
            $secretaire->setDateModif($date);

            $em->persist($secretaire);
            $em->flush();


            $request->getSession()->getFlashBag()->add('modifSuccess', "Secrétaire modifiée avec succès.");
            return $this->redirect($this->generateUrl('index_membres'));

        }
        return $this->render('MaitreOeuvreBundle:Membres:ajout_secretaire.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView(),
            ));
    }


    public function modifClientAction($id, Request $request)
    {
        $title = 'Modification d\'un artisan';
        $date = new \DateTime('now');

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('UserBundle:User')->find($id);
        $password = $client->getPassword();
        $form = $this->get('form.factory')->create(new ClientEditType(), $client);
        if ($form->handleRequest($request)->isValid()) {


            if (!empty($form->get('password')->getData())) {
                $client->setPlainPassword($form->get('password')->getData());
            } else {
                $client->setPassword($password);
            }
            $role = array('ROLE_CLIENT');
            $client->setRoles($role);
            $client->setEnabled(1);
            $client->setDateModif($date);

            $em->persist($client);
            $em->flush();


            $request->getSession()->getFlashBag()->add('modifSuccess', "Client modifié avec succès.");
            return $this->redirect($this->generateUrl('index_membres'));

        }


        return $this->render('MaitreOeuvreBundle:Membres:ajout_client.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView(),
            ));

    }

    public function consultClientAction(Request $request,$id)
    {
        $title='Consultation d\'un client';

        // création d'une instance Client
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('UserBundle:User')->find($id);
        $password = $client->getPassword();


        //création du formulaireType
        $form= $this->get('form.factory')->create(new ClientConsultType(),$client);



        return $this->render('MaitreOeuvreBundle:Membres:consult_client.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function ajoutArtisanAction(request $request)
    {
        $title = 'Ajout d\'un artisan';
        $date = new \DateTime('now');

        // création d'une instance Client
        $artisan = new User();


        //création du formulaireType
        $form = $this->get('form.factory')->create(new ArtisanType(), $artisan);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $listeArtisan = $em->getRepository('UserBundle:User')->listeMembres('artisan');
            $role = array('ROLE_ARTISAN');
            $artisan->setRoles($role);
            $artisan->setEnabled(1);
            $artisan->setDateCrea($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($artisan);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', "Artisan ajouté avec succès.");

            return $this->redirect($this->generateUrl('index_membres', array('listeArtisan' => $listeArtisan)));
        }


        return $this->render('MaitreOeuvreBundle:Membres:ajout_artisan.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function modifArtisanAction(Request $request, $id)
    {
        $title = 'Modification d\'un artisan';
        $date = new \DateTime('now');

        // création d'une instance Client
        $em = $this->getDoctrine()->getManager();
        $artisan = $em->getRepository('UserBundle:User')->find($id);
        $password = $artisan->getPassword();


        //création du formulaireType
        $form = $this->get('form.factory')->create(new ArtisanEditType(), $artisan);
        if ($form->handleRequest($request)->isValid()) {
            if (!empty($form->get('password')->getData())) {
                $artisan->setPlainPassword($form->get('password')->getData());
            } else {
                $artisan->setPassword($password);
            }

            $listeArtisan = $em->getRepository('UserBundle:User')->listeMembres('artisan');
            $role = array('ROLE_ARTISAN');
            $artisan->setRoles($role);
            $artisan->setDateModif($date);
            $em->persist($artisan);
            $em->flush();


            $request->getSession()->getFlashBag()->add('message', "Artisan modifié avec succès.");

            return $this->redirect($this->generateUrl('index_membres', array('listeArtisan' => $listeArtisan)));
        }


        return $this->render('MaitreOeuvreBundle:Membres:ajout_artisan.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function consultArtisanAction(Request $request, $id)
    {
        $title = 'Consultation d\'un artisan';

        // création d'une instance Client
        $em = $this->getDoctrine()->getManager();
        $artisan = $em->getRepository('UserBundle:User')->find($id);
        $password = $artisan->getPassword();


        //création du formulaireType
        $form = $this->get('form.factory')->create(new ArtisanConsultType(), $artisan);


        return $this->render('MaitreOeuvreBundle:Membres:consult_artisan.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }


    public function suppClientAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('UserBundle:User')->find($id);

        $form = $this->createFormBuilder($client)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($client);
            $em->flush();

            $request->getSession()->getFlashBag()->add('clientSuppSuccess', 'Suppression effectuer avec succès.');
            return $this->redirect($this->generateUrl('index_membres'));

        }

        return $this->render('MaitreOeuvreBundle:Membres:supp_client.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    public function suppArtisanAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $artisan = $em->getRepository('UserBundle:User')->find($id);

        $form = $this->createFormBuilder($artisan)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($artisan);
            $em->flush();

            $request->getSession()->getFlashBag()->add('ArtisanSuppSuccess', 'Suppression effectué avec succès.');
            return $this->redirect($this->generateUrl('index_membres'));

        }

        return $this->render('MaitreOeuvreBundle:Membres:supp_artisan.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    protected function dispatch($eventName, array $arguments = array())
    {
        $arguments = array_replace(array(
            'config' => $this->config,
            'em' => $this->em,
            'entity' => $this->entity,
            'request' => $this->request,
        ), $arguments);

        $subject = isset($arguments);
        $event = new GenericEvent($subject, $arguments);

        $this->get('event_dispatcher')->dispatch($eventName, $event);
    }


    /**
     *
     * @return Response|RedirectResponse
     */
    public function activeDesactiveMembreAction(Request $request)
    {
        $this->dispatch(MaitreOeuvreEvents::PRE_EDIT);

        $em = $this->getDoctrine()->getManager();

        $id = mb_strtolower($request->query->get('id'));
        $newValue = 'true' === mb_strtolower($request->query->get('newValue'));

        $qb = $em->createQueryBuilder();
        $qb->update('UserBundle:User', 'u')
            ->set('u.enabled', ':newValue')
            ->where('u.id = :ID')
            ->setParameter('ID', $id)
            ->setParameter('newValue', $newValue)
            ->getQuery()
            ->execute();

        return new Response((string)$newValue);
    }


}

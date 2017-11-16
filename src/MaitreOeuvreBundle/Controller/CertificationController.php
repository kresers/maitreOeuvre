<?php
/**
 * Created by PhpStorm.
 * User: crolland
 * Date: 26/04/2017
 * Time: 16:23
 */

namespace MaitreOeuvreBundle\Controller;
use MaitreOeuvreBundle\Entity\Certification;
use MaitreOeuvreBundle\Form\CertificationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CertificationController extends Controller
{

    public function indexAction()
    {
        $title = "Certification";
        $em = $this->getDoctrine()->getManager();
        $listeCertification = $em->getRepository('MaitreOeuvreBundle:Certification')->findAll();

        return $this->render('MaitreOeuvreBundle:Certification:index.html.twig',
                        array(
                            'title' => $title,
                            'listCertification' => $listeCertification
                        ));
    }

    public function ajoutCertificationAction(Request $request)
    {
        $title='Ajout certification';

        $certification = new Certification();


        $form= $this->get('form.factory')->create(new CertificationType(), $certification);
        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($certification);
            $em->flush();

            $request->getSession()->getFlashBag()->add('addSuccess', "Certification ajouté avec succès.");

            return $this->redirect($this->generateUrl('certification_index'));
        }


        return $this->render('MaitreOeuvreBundle:Certification:ajout.html.twig',
            array('title' => $title,
                'form' => $form->createView()));
    }

    public function modifCertificationAction($id, Request $request)
    {
        $title='Modification d\'un certification';

        $em = $this->getDoctrine()->getManager();
        $certification = $em->getRepository('MaitreOeuvreBundle:Certification')->find($id);


        $form= $this->get('form.factory')->create(new CertificationType(), $certification);
        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($certification);
            $em->flush();

            $request->getSession()->getFlashBag()->add('updateSuccess', "Certification modifiée avec succès.");
            return $this->redirect($this->generateUrl('certification_index'));
        }


        return $this->render('MaitreOeuvreBundle:Certification:ajout.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));
    }

    public function suppCertificationAction($id, Request $request)
    {
        $title = "Suppression";

        $em = $this->getDoctrine()->getManager();
        $certification = $em->getRepository('MaitreOeuvreBundle:Certification')->find($id);

        $form = $this->createFormBuilder($certification)
            ->add('delete', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em->remove($certification);
            $em->flush();

            $request->getSession()->getFlashBag()->add('deleteSuccess', 'Suppression effectuer.');
            return $this->redirect($this->generateUrl('certification_index'));

        }

        return $this->render('MaitreOeuvreBundle:Certification:supp.html.twig',
            array(
                'title' => $title,
                'form' => $form->createView()
            ));

    }

}
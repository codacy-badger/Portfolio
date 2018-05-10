<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $skills = $this->getDoctrine()->getManager()->getRepository('App:Skills')->findAll();

        $category = $this->getDoctrine()->getManager()->getRepository('App:SkillsCategory')->findAll();

        $projects = $this->getDoctrine()->getManager()->getRepository('App:Projects')->findAll();

        $contact = new Contact;

        $formBuilder = $this->get('form.factory')->createBuilder(ContactType::class, $contact);
        $form = $formBuilder->getForm();

        if ($form->handleRequest($request)->isSubmitted())
        {
            if($form->isValid())
            {
                $contact = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();

                $this->get('mymailer')->sendMessage($contact);

                $request->getSession()->getFlashBag()->add("success", "Votre message a bien été envoyé.");
            }
            else
            {
                $request->getSession()->getFlashBag()->add("warning", "Votre message n'a pas été envoyé.");
            }
        }

        return $this->render('index.html.twig',
            [
                'skills' => $skills,
                'categories' => $category,
                'projects' => $projects,
                'form' => $form->createView()
            ]);
    }
}
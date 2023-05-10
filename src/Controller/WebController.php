<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    #[Route('/', name: 'app_web')]
    public function index(): Response
    {
        return $this->render('web/index.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }

    #[Route('/contacto', name: 'app_web_contact')]
    public function conctact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $nombre = $form->get('nombre')->getData();
            $apellido = $form->get('apellido')->getData();
            $telefono = $form->get('telefono')->getData();
            $email = $form->get('email')->getData();
            //dd($nombre);

            #TODO: Enviar Email Consulta a Nova y enviar Email de Notificacion al Consultante sync

            #Redireccinar al formualrio de consulta con mensaje succes
            return $this->redirectToRoute('contact_succes');
        }

        return $this->render('web/contact.html.twig', [
            'form' => $form,
        ]);
    }
}

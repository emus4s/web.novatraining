<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    #[Route('/', name: 'app_web')]
    public function index(): Response
    {
        return $this->render('web/index.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }

    #[Route('/referencia', name: 'app_web_referencia')]
    public function referencia(): Response
    {
        return $this->render('web/referencia.html.twig', [
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
            try {
                $this->mailer->sendEmailContact($email);

                $this->addFlash(
                    'success',
                    'Tu mensaje fue enviado con exito'
                );

            } catch (\Exception $e) {
                //$this->logger->error($e->getMessage());
                //dd($e);
                $this->addFlash(
                    'danger',
                    'No pudimos enviar tu mensaje, intentelo mas tarde ...'
                );

            }

            return $this->redirectToRoute('app_web_contact_email');
        }

        return $this->render('web/contact.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/contacto/email', name: 'app_web_contact_email')]
    public function successSendEmailContact()
    {
        return $this->render('web/contact_email_message.html.twig');
    }
}

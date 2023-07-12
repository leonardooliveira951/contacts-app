<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    // /**
    //  * @Route("/login", name="app_login")
    //  */
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     // Get the login error, if any
    //     $error = $authenticationUtils->getLastAuthenticationError();

    //     // Get the last username entered by the user
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     return $this->render('security/login.html.twig', [
    //         'last_username' => $lastUsername,
    //         'error' => $error,
    //     ]);
    // }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        // This method can be empty - it will be intercepted by the logout key on your firewall
        throw new \Exception('This method should not be called directly.');
    }
}

<?php

namespace App\Controller;

use Stripe;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubscriptionController extends AbstractController
{
    #[Route('/premium/subscription', name: 'subscription', methods: ['POST'])]
    public function createCharge(Request $request)
    {
        Stripe\Stripe::setApiKey($_ENV["STRIPE_SECRET"]);
        Stripe\Charge::create ([
                "amount" => 100,
                "currency" => "eur",
                "source" => $request->request->get('stripeToken'),
                "description" => "Abonnement mensuel Premium à BlogXpress"
        ]);
        $this->addFlash(
            'success',
            'Vous êtes maintenant abonné à BlogXpress Premium !'
        );
        return $this->redirectToRoute('premium', [], Response::HTTP_SEE_OTHER);
    }
}

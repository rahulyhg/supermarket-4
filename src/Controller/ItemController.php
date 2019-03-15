<?php

namespace App\Controller;

use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Item;

class ItemController extends AbstractController
{
    /**
     * @Route("/item/add", name="item")
     */
    public function create(Request $request): Response
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($item);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('index');
        }

        return $this->render('item/create.html.twig', [
            'itemForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/item/{id}", name="item_show")
     */
    public function show(Item $item)
    {
        return new Response('Check out this great product: '.$item->getName());
    }
}

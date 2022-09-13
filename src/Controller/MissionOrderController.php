<?php

namespace App\Controller;

use App\Entity\MissionOrder;
use App\Form\MissionOrderType;
use App\Repository\MissionOrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mission/order')]
class MissionOrderController extends AbstractController
{
    #[Route('/', name: 'app_mission_order_index', methods: ['GET'])]
    public function index(MissionOrderRepository $missionOrderRepository): Response
    {
        return $this->render('mission_order/index.html.twig', [
            'mission_orders' => $missionOrderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mission_order_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MissionOrderRepository $missionOrderRepository): Response
    {
        $missionOrder = new MissionOrder();
        $form = $this->createForm(MissionOrderType::class, $missionOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionOrderRepository->add($missionOrder, true);

            return $this->redirectToRoute('app_mission_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mission_order/new.html.twig', [
            'mission_order' => $missionOrder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mission_order_show', methods: ['GET'])]
    public function show(MissionOrder $missionOrder): Response
    {
        return $this->render('mission_order/show.html.twig', [
            'mission_order' => $missionOrder,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mission_order_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MissionOrder $missionOrder, MissionOrderRepository $missionOrderRepository): Response
    {
        $form = $this->createForm(MissionOrderType::class, $missionOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $missionOrderRepository->add($missionOrder, true);

            return $this->redirectToRoute('app_mission_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mission_order/edit.html.twig', [
            'mission_order' => $missionOrder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mission_order_delete', methods: ['POST'])]
    public function delete(Request $request, MissionOrder $missionOrder, MissionOrderRepository $missionOrderRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$missionOrder->getId(), $request->request->get('_token'))) {
            $missionOrderRepository->remove($missionOrder, true);
        }

        return $this->redirectToRoute('app_mission_order_index', [], Response::HTTP_SEE_OTHER);
    }
}

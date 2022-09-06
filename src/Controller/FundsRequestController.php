<?php

namespace App\Controller;

use App\Entity\FundsRequest;
use App\Form\FundsRequestType;
use App\Repository\FundsRequestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/funds/request')]
class FundsRequestController extends AbstractController
{
    #[Route('/', name: 'app_funds_request_index', methods: ['GET'])]
    public function index(FundsRequestRepository $fundsRequestRepository): Response
    {
        return $this->render('funds_request/index.html.twig', [
            'funds_requests' => $fundsRequestRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_funds_request_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FundsRequestRepository $fundsRequestRepository): Response
    {
        $fundsRequest = new FundsRequest();
        $form = $this->createForm(FundsRequestType::class, $fundsRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fundsRequestRepository->add($fundsRequest, true);

            return $this->redirectToRoute('app_funds_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('funds_request/new.html.twig', [
            'funds_request' => $fundsRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_funds_request_show', methods: ['GET'])]
    public function show(FundsRequest $fundsRequest): Response
    {
        return $this->render('funds_request/show.html.twig', [
            'funds_request' => $fundsRequest,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_funds_request_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FundsRequest $fundsRequest, FundsRequestRepository $fundsRequestRepository): Response
    {
        $form = $this->createForm(FundsRequestType::class, $fundsRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fundsRequestRepository->add($fundsRequest, true);

            return $this->redirectToRoute('app_funds_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('funds_request/edit.html.twig', [
            'funds_request' => $fundsRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_funds_request_delete', methods: ['POST'])]
    public function delete(Request $request, FundsRequest $fundsRequest, FundsRequestRepository $fundsRequestRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fundsRequest->getId(), $request->request->get('_token'))) {
            $fundsRequestRepository->remove($fundsRequest, true);
        }

        return $this->redirectToRoute('app_funds_request_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\CashAccount;
use App\Form\CashAccountType;
use App\Repository\CashAccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cash/account')]
class CashAccountController extends AbstractController
{
    #[Route('/', name: 'app_cash_account_index', methods: ['GET'])]
    public function index(CashAccountRepository $cashAccountRepository): Response
    {
        return $this->render('cash_account/index.html.twig', [
            'cash_accounts' => $cashAccountRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cash_account_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CashAccountRepository $cashAccountRepository): Response
    {
        $cashAccount = new CashAccount();
        $form = $this->createForm(CashAccountType::class, $cashAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cashAccountRepository->add($cashAccount, true);

            return $this->redirectToRoute('app_cash_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cash_account/new.html.twig', [
            'cash_account' => $cashAccount,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cash_account_show', methods: ['GET'])]
    public function show(CashAccount $cashAccount): Response
    {
        return $this->render('cash_account/show.html.twig', [
            'cash_account' => $cashAccount,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cash_account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CashAccount $cashAccount, CashAccountRepository $cashAccountRepository): Response
    {
        $form = $this->createForm(CashAccountType::class, $cashAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cashAccountRepository->add($cashAccount, true);

            return $this->redirectToRoute('app_cash_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cash_account/edit.html.twig', [
            'cash_account' => $cashAccount,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cash_account_delete', methods: ['POST'])]
    public function delete(Request $request, CashAccount $cashAccount, CashAccountRepository $cashAccountRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cashAccount->getId(), $request->request->get('_token'))) {
            $cashAccountRepository->remove($cashAccount, true);
        }

        return $this->redirectToRoute('app_cash_account_index', [], Response::HTTP_SEE_OTHER);
    }
}

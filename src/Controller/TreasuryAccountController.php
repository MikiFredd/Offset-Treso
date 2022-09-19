<?php

namespace App\Controller;

use App\Entity\TreasuryAccount;
use App\Form\TreasuryAccountType;
use App\Repository\TreasuryAccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/treasury/account')]
class TreasuryAccountController extends AbstractController
{
    #[Route('/', name: 'app_treasury_account_index', methods: ['GET'])]
    public function index(TreasuryAccountRepository $treasuryAccountRepository): Response
    {
        return $this->render('treasury_account/index.html.twig', [
            'treasury_accounts' => $treasuryAccountRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_treasury_account_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TreasuryAccountRepository $treasuryAccountRepository): Response
    {
        $treasuryAccount = new TreasuryAccount();
        $form = $this->createForm(TreasuryAccountType::class, $treasuryAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $treasuryAccountRepository->add($treasuryAccount, true);

            return $this->redirectToRoute('app_treasury_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('treasury_account/new.html.twig', [
            'treasury_account' => $treasuryAccount,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_treasury_account_show', methods: ['GET'])]
    public function show(TreasuryAccount $treasuryAccount): Response
    {
        return $this->render('treasury_account/show.html.twig', [
            'treasury_account' => $treasuryAccount,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_treasury_account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TreasuryAccount $treasuryAccount, TreasuryAccountRepository $treasuryAccountRepository): Response
    {
        $form = $this->createForm(TreasuryAccountType::class, $treasuryAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $treasuryAccountRepository->add($treasuryAccount, true);

            return $this->redirectToRoute('app_treasury_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('treasury_account/edit.html.twig', [
            'treasury_account' => $treasuryAccount,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_treasury_account_delete', methods: ['POST'])]
    public function delete(Request $request, TreasuryAccount $treasuryAccount, TreasuryAccountRepository $treasuryAccountRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$treasuryAccount->getId(), $request->request->get('_token'))) {
            $treasuryAccountRepository->remove($treasuryAccount, true);
        }

        return $this->redirectToRoute('app_treasury_account_index', [], Response::HTTP_SEE_OTHER);
    }
}

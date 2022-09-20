<?php

namespace App\Controller;

use App\Entity\Tiers;
use App\Form\TiersType;
use App\Repository\TiersRepository;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/tiers')]
class TiersController extends AbstractController
{
    #[Route('/', name: 'app_tiers_index', methods: ['GET'])]
    public function index(TiersRepository $tiersRepository): Response
    {
        return $this->render('tiers/index.html.twig', [
            'tiers' => $tiersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tiers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TiersRepository $tiersRepository, FlashyNotifier $flashy): Response
    {
        $tier = new Tiers();
        $form = $this->createForm(TiersType::class, $tier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $flashy->success('Tiers enregistré !');
            $tiersRepository->add($tier, true);
            

            return $this->redirectToRoute('app_tiers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tiers/new.html.twig', [
            'tier' => $tier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tiers_show', methods: ['GET'])]
    public function show(Tiers $tier): Response
    {
        return $this->render('tiers/show.html.twig', [
            'tier' => $tier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tiers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tiers $tier, TiersRepository $tiersRepository, FlashyNotifier $flashy): Response
    {
        $form = $this->createForm(TiersType::class, $tier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $flashy->info('Modifications éffectuées !');
            $tiersRepository->add($tier, true);
            

            return $this->redirectToRoute('app_tiers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tiers/edit.html.twig', [
            'tier' => $tier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tiers_delete', methods: ['POST'])]
    public function delete(Request $request, Tiers $tier, TiersRepository $tiersRepository, FlashyNotifier $flashy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tier->getId(), $request->request->get('_token'))) {
            $tiersRepository->remove($tier, true);
            $flashy->error('Tiers supprimé !');
        }

        return $this->redirectToRoute('app_tiers_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\Bibliothecaire;
use App\Form\BibliothecaireType;
use App\Repository\BibliothecaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bibliothecaire")
 */
class BibliothecaireController extends AbstractController
{
    /**
     * @Route("/", name="app_bibliothecaire_index", methods={"GET"})
     */
    public function index(BibliothecaireRepository $bibliothecaireRepository): Response
    {
        return $this->render('bibliothecaire/index.html.twig', [
            'bibliothecaires' => $bibliothecaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bibliothecaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BibliothecaireRepository $bibliothecaireRepository): Response
    {
        $bibliothecaire = new Bibliothecaire();
        $form = $this->createForm(BibliothecaireType::class, $bibliothecaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bibliothecaireRepository->add($bibliothecaire);
            return $this->redirectToRoute('app_bibliothecaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bibliothecaire/new.html.twig', [
            'bibliothecaire' => $bibliothecaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_bibliothecaire_show", methods={"GET"})
     */
    public function show(Bibliothecaire $bibliothecaire): Response
    {
        return $this->render('bibliothecaire/show.html.twig', [
            'bibliothecaire' => $bibliothecaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bibliothecaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bibliothecaire $bibliothecaire, BibliothecaireRepository $bibliothecaireRepository): Response
    {
        $form = $this->createForm(BibliothecaireType::class, $bibliothecaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bibliothecaireRepository->add($bibliothecaire);
            return $this->redirectToRoute('app_bibliothecaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bibliothecaire/edit.html.twig', [
            'bibliothecaire' => $bibliothecaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_bibliothecaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Bibliothecaire $bibliothecaire, BibliothecaireRepository $bibliothecaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bibliothecaire->getId(), $request->request->get('_token'))) {
            $bibliothecaireRepository->remove($bibliothecaire);
        }

        return $this->redirectToRoute('app_bibliothecaire_index', [], Response::HTTP_SEE_OTHER);
    }
}

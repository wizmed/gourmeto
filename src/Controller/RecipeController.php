<?php

namespace App\Controller;

use App\Entity\Recipe;
use DateTimeImmutable;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipeController extends AbstractController
{
    #[Route('/recettes', name: 'recettes')]
    public function index(EntityManagerInterface $entityManager, RecipeRepository $recipeRepository  ): Response
    {

        

        // Récupérer toutes les recettes depuis la base de données
        $recettes = $recipeRepository->findAll();

        return $this->render('recipe/index.html.twig', [
            'recettes' => $recettes,
        ]);
    }

    #[Route('/recette/{slug}', name: 'recette_show', requirements: ['slug'=> '[a-z0-9-]+'])]
    public function show(RecipeRepository $recipeRepository, string $slug): Response
    {
      
        $recette = $recipeRepository->findOneBy(['slug' => $slug ]);
        if ( $recette === null ){
            return $this->redirectToRoute('recettes');
        }
        return $this->render('recipe/show.html.twig', [
            'recette' => $recette,
            'slug' => $slug
        ]);
    }

    #[Route('/recette/{slug}/edit', name:'recette_edit')]
    public function edit(Request $request, RecipeRepository $recipeRepository, EntityManagerInterface $em, string $slug){
        
        $recette = $recipeRepository->findOneBy(['slug' => $slug]);
        $form = $this->createForm(RecipeType::class, $recette);
        $form ->handleRequest($request);
        
        if( $form->isSubmitted() && $form->isValid()){
          
            $em->flush();

            $this->addFlash('success', 'La recette a été mise à jour avec succès.');
  

            return $this->redirectToRoute('home');
        }
        return $this->render('recipe/edit.html.twig',[
            'recette' => $recette,
            'slug' => $slug,
            'form'=> $form

        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
     
        return $this->render('recipe/show.html.twig', [
            'recette' => $recette,
            'slug' => $slug
        ]);
    }
}

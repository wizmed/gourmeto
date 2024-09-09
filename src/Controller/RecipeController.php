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
        /*
        // Création d'une nouvelle recette
        $recette = new Recipe();
        $recette->setTitle("Magret de Canard avec Sauce au Miel")
                ->setContent("Préchauffez votre four à 180°C (350°F). Incisez la peau des magrets en formant des croisillons, sans atteindre la viande. Assaisonnez les magrets des deux côtés avec du sel et du poivre. Faites chauffer une poêle à feu moyen-vif. Placez les magrets côté peau dans la poêle sans ajouter de graisse. Faites cuire les magrets pendant environ 5 à 6 minutes, ou jusqu’à ce que la peau soit bien dorée et croustillante. Retournez les magrets et faites-les cuire côté viande pendant environ 2 à 3 minutes pour une cuisson rosée. Ajustez le temps de cuisson selon votre préférence (plus ou moins cuit). Pendant que les magrets cuisent, préparez la sauce. Dans une petite casserole, faites revenir l’échalote hachée à feu moyen avec un peu d’huile jusqu’à ce qu’elle soit translucide. Ajoutez le miel, le vinaigre balsamique, la sauce soja, et le thym. Mélangez bien et laissez réduire pendant environ 2 minutes. Ajoutez le bouillon de volaille et laissez mijoter à feu doux jusqu’à ce que la sauce réduise et épaississe légèrement, environ 5 minutes. Sortez les magrets de la poêle et laissez-les reposer pendant quelques minutes avant de les trancher. Servez les tranches de magret de canard nappées de la sauce au miel.")
                ->setDuration("30")
                ->setSlug("magret-de-canard-avec-sauce-au-miel")
                ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
                ->setUpdatedAt(new DateTimeImmutable());

        // Persist l'entité dans la base de données
        $entityManager->persist($recette);
        $entityManager->flush();
        */
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

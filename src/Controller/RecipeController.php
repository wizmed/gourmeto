<?php

namespace App\Controller;

use App\Entity\Recipe;
use DateTimeImmutable;
use App\Form\RecipeType;
use App\Form\SearchRecipeType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipeController extends AbstractController
{
    #[Route('/recette', name: 'recette_list')]
    public function index(RecipeRepository $recipeRepository, Request $request): Response
    {
        // Vérifier si un tri est demandé dans la requête
        if ($request->query->has('order')) {
            // Récupérer l'ordre de tri (par défaut 'ASC' si non spécifié)
            $order = $request->query->get('order', 'ASC');
            // Récupérer les recettes triées
            $recette_list = $recipeRepository->findAllOrderedByDuration($order);
        } else {
            // Si aucun tri n'est demandé, récupérer toutes les recettes sans tri
            $recette_list = $recipeRepository->findAll();
        }

        return $this->render('recipe/index.html.twig', [
            'recette_list' => $recette_list,
            'order' => $order ?? null, // Passer l'ordre seulement s'il existe
        ]);
    }

    #[Route('/recette/recherche', name: 'recipe_search')]
    public function search(Request $request, RecipeRepository $recipeRepository): Response
    {
        $form = $this->createForm(SearchRecipeType::class);
        $form->handleRequest($request);

        $recipes = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $searchTerm = $form->get('search')->getData();
            $recipes = $recipeRepository->findBySearchTerm($searchTerm);
        }

        return $this->render('recipe/search_results.html.twig', [
            'form' => $form->createView(),
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recette/new', name: 'recette_new')]
public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
{
    $recette = new Recipe();
    $form = $this->createForm(RecipeType::class, $recette, [
        'include_options' => false, // Ne pas inclure les dates pour la création
    ]);

    $form->handleRequest($request);
    // dump($form->getData());

    if ($form->isSubmitted() && $form->isValid()) {
        // Gestion des dates
        $recette->setCreatedAt(new \DateTimeImmutable());
        $recette->setUpdatedAt(new \DateTimeImmutable());

        // Gestion du slug
        $title = $recette->getTitle();
        $slug = $slugger->slug($title)->lower();
        $recette->setSlug($slug);

        // Sauvegarde en base de données dans un bloc try-catch
        try {
            $em->persist($recette);
            $em->flush();

            // Recharger la recette pour obtenir les données correctes
            $recette = $em->getRepository(Recipe::class)->findOneBy(['slug' => $slug]);

            // Message flash de succès
            $this->addFlash('success', 'Votre recette <strong>' . $recette->getTitle() . '</strong> a bien été créée.');
            
            return $this->redirectToRoute('recette_show', ['slug' => $recette->getSlug()]);
        } catch (\Exception $e) {
            // Si une erreur survient, ajouter un message flash d'erreur
            $this->addFlash('danger', 'Une erreur est survenue lors de la création de la recette.');
            // Log the error or handle it accordingly (e.g., logging the $e->getMessage())
        }
    }

    // Renvoyer le formulaire si non soumis ou invalide
    return $this->render('recipe/new.html.twig', [
        'recette' => $recette,
        'form' => $form,
    ]);
}


   

    #[Route('/recette/{slug}', name: 'recette_show', requirements: ['slug'=> '[a-z0-9-]+'])]
    public function show(RecipeRepository $recipeRepository, string $slug): Response
    {
      
        $recette = $recipeRepository->findOneBy(['slug' => $slug ]);
        if ( $recette === null ){
            return $this->redirectToRoute('recette_list');
        }
        return $this->render('recipe/show.html.twig', [
            'recette' => $recette,
            'slug' => $slug
        ]);
    }

    

    #[Route('/recette/{slug}/edit', name:'recette_edit')]
    public function edit(Request $request, EntityManagerInterface $em, string $slug):Response
    {
        
        //$recette = $recipeRepository->findOneBy(['slug' => $slug]);
        $recette= $em -> getRepository(Recipe::class)->findOneBy(['slug' => $slug]);
         // Vérifier si la recette existe
         if (!$recette) {
            // Ajouter un message d'erreur ou une gestion des cas où la recette n'existe pas
            $this->addFlash('danger', 'La recette que vous souhaitez modifier n\'existe pas.');

            // Rediriger vers une autre page (par exemple, la liste des recettes)
            return $this->redirectToRoute('recette_list'); // Assurez-vous que cette route existe
        }
        $form = $this->createForm(RecipeType::class, $recette, [
            'include_options' => true, // Inclure les dates et le slug pour l'édition
        ]);
        $form ->handleRequest($request);
        
        if( $form->isSubmitted() && $form->isValid()){
          
            $em->flush();

            $this->addFlash('success', 'La recette <strong>'.$recette->getTitle().'</strong> a bien été mise à jour avec succès.');
  

            return $this->redirectToRoute('recette_list');
        }
        return $this->render('recipe/edit.html.twig',[
            'recette' => $recette,
            'slug' => $slug,
            'form'=> $form

        ]);
    }

    #[Route('/recette/{slug}/delete', name: 'recette_delete')]
    public function delete(RecipeRepository $repo, EntityManagerInterface $em, string $slug): Response
    {
        // Trouver la recette par son slug
        $recette = $repo->findOneBy(['slug' => $slug]);

        // Vérifier si la recette existe
        if (!$recette) {
            // Ajouter un message d'erreur ou une gestion des cas où la recette n'existe pas
            $this->addFlash('danger', 'La recette que vous souhaitez supprimer n\'existe pas.');

            // Rediriger vers une autre page (par exemple, la liste des recettes)
            return $this->redirectToRoute('recette_list'); // Assurez-vous que cette route existe
        }

        // Supprimer la recette
        $em->remove($recette);
        $em->flush(); // Notez les parenthèses

        // Ajouter un message de succès
        $this->addFlash('success', 'La recette <strong>'.$recette->getTitle().'</strong> a été supprimée avec succès.');

        // Rediriger vers une autre page (par exemple, la liste des recettes)
        return $this->redirectToRoute('recette_list'); // Assurez-vous que cette route existe
    }


   
}
    
    
   

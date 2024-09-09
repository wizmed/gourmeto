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
        
        // Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Tartare de Saumon Frais avec Herbes Fraîches")
        ->setContent("Préparez le tartare en coupant le saumon frais en petits dés. Mélangez avec des herbes fraîches hachées, comme de l'aneth et du ciboulette. Ajoutez un peu de jus de citron, de l'huile d'olive, du sel et du poivre au goût. Servez frais avec des tranches de pain grillé.")
        ->setDuration("15")
        ->setSlug("tartare-de-saumon-frais-avec-herbes-fraiches")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Panacotta à la Fraise Accompagnée d'une Compotée de Fraises")
        ->setContent("Préparez la panacotta en chauffant de la crème avec du sucre et de la vanille, puis ajoutez de la gélatine dissoute. Versez dans des moules et laissez refroidir au réfrigérateur. Pour la compotée, faites cuire des fraises avec un peu de sucre jusqu'à ce qu'elles soient tendres. Servez la panacotta avec la compotée de fraises.")
        ->setDuration("45")
        ->setSlug("panacotta-a-la-fraise-accompagnee-dune-compotee-de-fraises")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Risotto aux Champignons Sauvages")
        ->setContent("Faites revenir des échalotes et des champignons sauvages dans du beurre. Ajoutez du riz arborio et faites-le sauter jusqu'à ce qu'il devienne translucide. Ajoutez du bouillon de volaille chaud progressivement, en remuant constamment, jusqu'à ce que le riz soit crémeux et cuit. Terminez avec du parmesan râpé et du persil frais.")
        ->setDuration("35")
        ->setSlug("risotto-aux-champignons-sauvages")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Magret de Canard aux Agrumes")
        ->setContent("Préparez une marinade avec du jus d'orange, du jus de citron, du miel et du gingembre. Faites mariner les magrets de canard pendant au moins une heure. Faites cuire les magrets dans une poêle à feu moyen jusqu'à ce que la peau soit croustillante et la viande rosée. Servez avec un glaçage aux agrumes réduit.")
        ->setDuration("30")
        ->setSlug("magret-de-canard-aux-agrumes")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Tarte au Chocolat Noir et aux Noisettes")
        ->setContent("Préparez une pâte brisée et étalez-la dans un moule à tarte. Faites fondre du chocolat noir avec de la crème pour préparer la ganache. Versez la ganache sur la pâte cuite et parsemez de noisettes grillées. Laissez refroidir avant de servir.")
        ->setDuration("60")
        ->setSlug("tarte-au-chocolat-noir-et-aux-noisettes")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Soufflé au Fromage")
        ->setContent("Préparez une béchamel en faisant fondre du beurre, en ajoutant de la farine et en versant du lait progressivement. Ajoutez du fromage râpé et assaisonnez. Montez des blancs d'œufs en neige et incorporez-les délicatement à la préparation. Versez dans des ramequins beurrés et enfournez à 180°C (350°F) pendant environ 25 minutes jusqu'à ce que le soufflé soit doré.")
        ->setDuration("40")
        ->setSlug("souffle-au-fromage")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Filet Mignon de Porc aux Pommes")
        ->setContent("Faites revenir des filets mignons de porc dans une poêle avec du beurre jusqu'à ce qu'ils soient dorés. Ajoutez des pommes coupées en dés et faites cuire jusqu'à ce qu'elles soient tendres. Déglacez la poêle avec du cidre et laissez réduire. Servez avec des pommes caramélisées et une sauce réduite.")
        ->setDuration("30")
        ->setSlug("filet-mignon-de-porc-aux-pommes")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Gâteau au Citron et aux Graines de Pavot")
        ->setContent("Préparez une pâte à gâteau en mélangeant du beurre, du sucre, des œufs, de la farine, des graines de pavot et du zeste de citron. Versez dans un moule et faites cuire au four jusqu'à ce que le gâteau soit doré et un cure-dent en ressorte propre. Glacez avec un glaçage au citron.")
        ->setDuration("50")
        ->setSlug("gateau-au-citron-et-aux-graines-de-pavot")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Pâtes aux Crevettes et au Pesto")
        ->setContent("Faites cuire des pâtes selon les instructions du paquet. Pendant ce temps, faites sauter des crevettes dans une poêle avec de l'ail et de l'huile d'olive. Ajoutez du pesto et mélangez avec les pâtes cuites. Servez avec du parmesan râpé et des pignons de pin grillés.")
        ->setDuration("25")
        ->setSlug("pates-aux-crevettes-et-au-pesto")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Sole Meunière")
        ->setContent("Panez les filets de sole avec de la farine et faites-les cuire dans une poêle avec du beurre jusqu'à ce qu'ils soient dorés. Préparez une sauce en faisant fondre du beurre avec du jus de citron et du persil haché. Servez les filets nappés de sauce.")
        ->setDuration("20")
        ->setSlug("sole-meuniere")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Quiche Lorraine")
        ->setContent("Préparez une pâte brisée et foncez un moule à tarte. Préparez la garniture en mélangeant des œufs, de la crème, du lait, du lardons cuits et du fromage râpé. Versez sur la pâte et faites cuire au four jusqu'à ce que la quiche soit dorée.")
        ->setDuration("45")
        ->setSlug("quiche-lorraine")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Mousse au Chocolat Blanc")
        ->setContent("Faites fondre du chocolat blanc et incorporez-le à de la crème fouettée. Ajoutez des blancs d'œufs montés en neige et mélangez délicatement. Réfrigérez pendant quelques heures avant de servir.")
        ->setDuration("20")
        ->setSlug("mousse-au-chocolat-blanc")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Soupe à l'Oignon Gratinée")
        ->setContent("Faites revenir des oignons émincés dans du beurre jusqu'à ce qu'ils soient caramélisés. Déglacez avec du vin blanc et ajoutez du bouillon de volaille. Faites cuire jusqu'à ce que la soupe soit bien aromatisée. Servez avec des tranches de pain grillé et du fromage râpé gratiné.")
        ->setDuration("40")
        ->setSlug("soupe-a-l-oignon-gratinee")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Tiramisu au Café")
        ->setContent("Préparez un mélange de mascarpone, de jaunes d'œufs, de sucre et de café. Trempez des boudoirs dans du café fort et alternez avec le mélange de mascarpone dans un plat. Réfrigérez pendant au moins 4 heures avant de servir.")
        ->setDuration("30")
        ->setSlug("tiramisu-au-cafe")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Boeuf Bourguignon")
        ->setContent("Faites revenir des morceaux de bœuf dans du beurre jusqu'à ce qu'ils soient bien dorés. Ajoutez des oignons, des carottes et de l'ail, puis déglacez avec du vin rouge. Ajoutez du bouillon de viande, des herbes et faites mijoter jusqu'à ce que la viande soit tendre.")
        ->setDuration("120")
        ->setSlug("boeuf-bourguignon")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Crème Brûlée")
        ->setContent("Préparez une crème en mélangeant des jaunes d'œufs, du sucre, de la crème et de la vanille. Versez dans des ramequins et faites cuire au bain-marie jusqu'à ce que la crème soit prise. Refroidissez, puis caramélisez le dessus avec du sucre.")
        ->setDuration("50")
        ->setSlug("creme-brulee")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Éclair au Chocolat")
        ->setContent("Préparez une pâte à choux et formez des éclairs sur une plaque. Faites-les cuire au four jusqu'à ce qu'ils soient dorés. Préparez une crème pâtissière au chocolat et garnissez les éclairs. Glacez avec un glaçage au chocolat.")
        ->setDuration("60")
        ->setSlug("eclair-au-chocolat")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Risotto aux Champignons")
        ->setContent("Faites revenir des échalotes et des champignons dans du beurre. Ajoutez du riz arborio et faites-le nacrer. Ajoutez progressivement du bouillon de légumes tout en remuant jusqu'à ce que le riz soit tendre et crémeux. Incorporez du parmesan râpé avant de servir.")
        ->setDuration("40")
        ->setSlug("risotto-aux-champignons")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Curry de Poulet au Lait de Coco")
        ->setContent("Faites revenir des morceaux de poulet avec des oignons et de l'ail dans une poêle. Ajoutez du curry en poudre, du lait de coco et laissez mijoter jusqu'à ce que le poulet soit cuit et la sauce épaissie. Servez avec du riz basmati.")
        ->setDuration("35")
        ->setSlug("curry-de-poulet-au-lait-de-coco")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Ratatouille Provençale")
        ->setContent("Coupez des courgettes, des aubergines, des poivrons et des tomates en dés. Faites revenir de l'ail et des oignons dans de l'huile d'olive, puis ajoutez les légumes. Laissez mijoter à feu doux jusqu'à ce que les légumes soient tendres et les saveurs bien mélangées.")
        ->setDuration("50")
        ->setSlug("ratatouille-provencale")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Tarte Tatin")
        ->setContent("Caramélisez des quartiers de pommes dans du beurre et du sucre dans une poêle. Recouvrez-les avec une pâte feuilletée et faites cuire au four jusqu'à ce que la pâte soit dorée. Retournez la tarte avant de servir pour dévoiler les pommes caramélisées.")
        ->setDuration("60")
        ->setSlug("tarte-tatin")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Pizza Margherita")
        ->setContent("Préparez une pâte à pizza et étalez-la en un disque. Garnissez de sauce tomate, de mozzarella et de feuilles de basilic frais. Faites cuire au four jusqu'à ce que la pâte soit croustillante et le fromage fondu et doré.")
        ->setDuration("25")
        ->setSlug("pizza-margherita")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Poulet Rôti au Citron et Romarin")
        ->setContent("Enduisez un poulet entier d'huile d'olive, de jus de citron et de romarin frais. Salez et poivrez. Faites cuire au four jusqu'à ce que la peau soit dorée et croustillante, et la viande bien juteuse. Servez avec des pommes de terre rôties.")
        ->setDuration("90")
        ->setSlug("poulet-roti-au-citron-et-romarin")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Salade César")
        ->setContent("Préparez une sauce César en mélangeant de l'ail, des anchois, du parmesan, du jus de citron, et de l'huile d'olive. Mélangez avec des feuilles de romaine, des croûtons et des morceaux de poulet grillé. Servez avec des copeaux de parmesan.")
        ->setDuration("20")
        ->setSlug("salade-cesar")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Tagine d'Agneau aux Pruneaux")
        ->setContent("Faites revenir des morceaux d'agneau dans une cocotte avec des oignons et des épices. Ajoutez des pruneaux, des amandes et de l'eau. Laissez mijoter doucement jusqu'à ce que la viande soit tendre et parfumée.")
        ->setDuration("120")
        ->setSlug("tagine-d-agneau-aux-pruneaux")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Fondant au Chocolat")
        ->setContent("Faites fondre du chocolat noir et du beurre au bain-marie. Mélangez avec du sucre et des œufs, puis ajoutez de la farine. Versez dans des ramequins et faites cuire jusqu'à ce que les bords soient pris mais que l'intérieur reste fondant.")
        ->setDuration("30")
        ->setSlug("fondant-au-chocolat")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

// Création d'une nouvelle recette
$recette = new Recipe();
$recette->setTitle("Paella aux Fruits de Mer")
        ->setContent("Faites revenir des oignons et de l'ail avec du riz dans une grande poêle. Ajoutez du bouillon, du safran, et des fruits de mer comme des moules, des crevettes et des calamars. Laissez cuire jusqu'à ce que le riz soit tendre et les fruits de mer cuits.")
        ->setDuration("60")
        ->setSlug("paella-aux-fruits-de-mer")
        ->setCreatedAt(new DateTimeImmutable()) // Utilise l'heure actuelle
        ->setUpdatedAt(new DateTimeImmutable());

// Persist l'entité dans la base de données
$entityManager->persist($recette);
$entityManager->flush();

        
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

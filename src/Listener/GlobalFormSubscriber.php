<?php
// src/Listener/GlobalFormSubscriber.php
namespace App\Listener;

use App\Form\SearchRecipeType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment as TwigEnvironment;

class GlobalFormSubscriber implements EventSubscriberInterface
{
    private $formFactory;
    private $twig;
    private $requestStack;
    private $router;

    public function __construct(FormFactoryInterface $formFactory, TwigEnvironment $twig, RequestStack $requestStack, RouterInterface $router)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->requestStack = $requestStack;
        $this->router = $router;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event)
    {
        // Crée le formulaire avec l'action de recherche définie
        $form = $this->formFactory->create(SearchRecipeType::class, null, [
            'action' => $this->router->generate('recipe_search'), // Modifier ici pour la route recipe_search
        ]);
        
        $request = $this->requestStack->getCurrentRequest();
        $form->handleRequest($request);

        // Ajoute le formulaire global à Twig
        $this->twig->addGlobal('search_form', $form->createView());
    }
}

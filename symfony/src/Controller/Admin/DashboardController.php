<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\Club;
use App\Entity\Player;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CardCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sorare');
    }

    public function configureMenuItems(): iterable
    {
        // SECTION
        yield MenuItem::section('Jeu');

        // LIEN VERS PAGE DE CRUD
        yield MenuItem::linkToCrud('Cartes', 'fa-solid fa-credit-card', Card::class);

        // SECTION
        yield MenuItem::section('Administration');

        // SOUS MENU
        yield MenuItem::subMenu('Joueurs', 'fa fa-user')->setSubItems([
            MenuItem::linkToCrud('Joueurs', 'fa fa-user', Player::class),
            MenuItem::linkToCrud('Ajouter un joueur', 'fa fa-plus', Player::class)
                ->setAction('new')
        ]);

        // LIEN VERS PAGE DE CRUD
        yield MenuItem::linkToCrud('Club', 'fa fa-house', Club::class);

        // SECTION
        yield MenuItem::section('Autres');


        // SOUS MENU
        yield MenuItem::subMenu('Réseaux', 'fa fa-heart')->setSubItems([
            MenuItem::linkToUrl('Instragram', 'fab fa-instagram', 'https://google.com'),
            MenuItem::linkToUrl('Facebook', 'fab fa-facebook', 'https://google.com')
        ]);
    }
}

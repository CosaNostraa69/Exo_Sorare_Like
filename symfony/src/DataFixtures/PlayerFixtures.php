<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends AbstractFixtures implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $players = [
            [
                "name" => "Cristiano Ronaldo",
                "picture" => 'cristiano_ronaldo.jpg'
            ],
            [
                "name" => "Lionel Messi",
                "picture" => "lionel_messi.jpg"
            ],
            [
                "name" => "Mohamed Salah",
                "picture" => "mohamed_salah.jpg"
            ],
            [
                "name" => "Karim Benzema",
                "picture" => "karim_benzema.jpg"
            ],
            [
                "name" => "Robert Lewandowski",
                "picture" => "robert_lewandowski.jpeg"
            ],
            [
                "name" => "Neymar Jr.",
                "picture" => "neymar_jr.jpg"
            ],
            [
                "name" => "Sergio Ramos",
                "picture" => "sergio_ramos.jpg"
            ],
            [
                "name" => "Virgil van Dijk",
                "picture" => "virgil_van_dijk.jpg"
            ],
            [
                "name" => "Manuel Neuer",
                "picture" => "manuel_neuer.jpg"
            ],
            [
                "name" => "Paulo Dybala",
                "picture" => "paulo_dybala.jpg"
            ],
            [
                "name" => "Kylian Mbappé",
                "picture" => "kylian_mbappé.webp"
            ],
            [
                "name" => "Eden Hazard",
                "picture" => "eden_hazard.webp"
            ],
            [
                "name" => "Zlatan Ibrahimović",
                "picture" => "zlatan_ibrahimović.jpg"
            ],
        ];

        foreach ($players as $key => $player) {
            $newPlayer = new Player();
            $newPlayer->setName($player['name']);
            $newPlayer->setPicture($player['picture']);
            $newPlayer->setClub($this->getReference('club_' . $this->faker->numberBetween(0, 9)));

            $manager->persist($newPlayer);
            $this->setReference('player_' . $key, $newPlayer);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClubFixtures::class
        ];
    }
}
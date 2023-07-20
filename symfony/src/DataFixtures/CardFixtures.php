<?php

namespace App\DataFixtures;

use App\Entity\Card;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends AbstractFixtures implements DependentFixtureInterface
{
    const SCARCITY = [
        "common",
        "rare",
        "legend"
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 200; $i++) {
            $newCard = new Card();
            $newCard->setPlayer($this->getReference('player_' . $this->faker->numberBetween(0, 12)));
            $newCard->setOwner($this->getReference('user_' . $this->faker->numberBetween(0, 19)));
            $newCard->setScarcity($this->faker->randomElement(self::SCARCITY));

            $manager->persist($newCard);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PlayerFixtures::class,
            UserFixtures::class
        ];
    }
}
<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClubFixtures extends AbstractFixtures implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $clubs = [
            'Allemagne_0' => 'FC Bayern Munich',
            'Allemagne_1' => 'Borussia Dortmund',
            'Angleterre_0' => 'Manchester United',
            'Angleterre_1' => 'Liverpool FC',
            'Angleterre_2' => 'Chelsea FC',
            'Espagne_0' => 'Real Madrid',
            'Espagne_1' => 'FC Barcelone',
            'Italie_0' => 'Juventus FC',
            'Italie_1' => 'AC Milan',
            'France_0' => 'Paris Saint-Germain',
        ];

        $index = 0;

        foreach ($clubs as $country => $club) {
            $newClub = new Club();
            $newClub->setName($club);
            $countryRef = '';

            switch ($country) {
                case str_contains($country, 'Espagne'):
                    $countryRef = 'Espagne';
                    break;
                case str_contains($country, 'Angleterre'):
                    $countryRef = 'Angleterre';
                    break;
                case str_contains($country, 'Allemagne'):
                    $countryRef = 'Allemagne';
                    break;
                case str_contains($country, 'Italie'):
                    $countryRef = 'Italie';
                    break;
                case str_contains($country, 'France'):
                    $countryRef = 'France';
                    break;
            }

            $newClub->setCountry($this->getReference($countryRef));
            $this->setReference('club_' . $index, $newClub);
            $index++;

            $manager->persist($newClub);
        }

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CountryFixtures::class
        ];
    }
}
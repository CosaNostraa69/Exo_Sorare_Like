<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends AbstractFixtures
{
    public function load(ObjectManager $manager)
    {
        $usernames = [
            'GoalMaster',
            'SoccerStar',
            'KickKing',
            'FootballFanatic',
            'NetStriker',
            'ScoreChamp',
            'BallWizard',
            'TeamCaptain',
            'FootieLover',
            'SkillMaestro',
            'GameOnPlayer',
            'ShootScorer',
            'PassMaster',
            'DribblePro',
            'TackleAce',
            'GoalTracker',
            'PitchWarrior',
            'SoccerGuru',
            'SpeedDemon',
            'CornerKicker'
        ];

        foreach ($usernames as $key => $username) {
            $newUser = new User();
            $newUser->setUsername($username);

            $manager->persist($newUser);
            $this->setReference('user_' . $key, $newUser);
        }

        $manager->flush();
    }
}
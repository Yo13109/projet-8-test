<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Task;

class TaskFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $datas = [
            1 => [
                'title' => 'Projet 1',
                'task' => "Définissez votre stratégie d'apprentissage",
                'isDone' => 1,
            ],
            2 => [
                'title' => 'Projet 2',
                'task' => 'Intégrez un thème Wordpress pour un client',
                'isDone' => 1,
            ],
            3 => [
                'title' => 'Projet 3',
                'task' => 'Analysez les besoins de votre client pour son festival de films',
                'isDone' => 1,
            ],
            4 =>  [
                'title' => 'Projet 4',
                'task' => "Concevez la solution technique d'une application de restauration en ligne, ExpressFood",
                'isDone' => 1,
            ],
            5 =>  [
                'title' => 'Projet 5',
                'task' => 'Créez votre premier blog en PHP',
                'isDone' => 1,
            ],
            6 =>  [
                'title' => 'Projet 6',
                'task' => 'Développez de A à Z le site communautaire SnowTricks',
                'isDone' => 1,
            ],
            7 => [
                'title' => 'Projet 7',
                'task' => 'Créez un web service exposant une API',
                'isDone' => 1,
            ],
            8 => [
                'title' => 'Projet 8',
                'task' => 'Améliorez une application existante de ToDo & Co',
                'isDone' => 0,
            ],
            9 => [
                'title' => 'Projet 9',
                'task' => 'Construisez une veille technologique et (optionnel) effectuez un stage',
                'isDone' => 0,
                
            ],
           
        ];

        foreach ($datas as $key => $taskdatas) {
            $task = new Task();
            $task
                ->setTitle($taskdatas['title'])
                ->setCreatedAt()
                ->setContent($taskdatas['content'])
                ->setIsDone($taskdatas['isDone'])
               
                
            $manager->persist($task);
        }

        $manager->flush();
    }
}

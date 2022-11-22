<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TaskType;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends AbstractController
{
   
    #[Route('/tasklist', name: 'task_list')]
    public function listTask(): Response
    {
        return $this->render('task/taskList.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
    #[Route('/createtask', name: 'task_create')]
    public function createAction(EntityManagerInterface $em, Request $request ): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setCreatedAt(new \DateTimeImmutable)
                ->setIsDone(false);
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('task/createtask.html.twig', [
            'form' => $form->createView()
        ])
        ;
    }
}


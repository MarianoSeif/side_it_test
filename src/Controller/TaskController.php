<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\NewTaskFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TaskController extends Controller
{
    public function listAction(EntityManagerInterface $em, Request $request)
    {
        $task_repo = $em->getRepository(Task::class);
        $tasks = $task_repo->findAllOrderedByNewest();
        return $this->render('task/task_list.html.twig', [
            'tasks'=>$tasks
        ]);
    }

    public function addAction(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(NewTaskFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('listTask');
        }
        return $this->render('task/task_add.html.twig', [
            'newTaskForm'=>$form->createView()
        ]);
    }

    public function updateAction($id)
    {
        return $this->render('task/task_update.html.twig', [
            'id'=>$id
        ]);
    }

    public function test()
    {
        return $this->render('task/task_test.html.twig', [
            'id'=>'this is a test'
        ]);
    }
}

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

    public function updateAction($id, Request $request, EntityManagerInterface $em)
    {
        $task = $this->getDoctrine()
            ->getRepository(Task::class)
            ->find($id);
        
        $form = $this->createForm(NewTaskFormType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();
            $em->persist($task);
            $em->flush();
            return $this->redirectToRoute('listTask');
        }
        
        return $this->render('task/task_update.html.twig', [
            'newTaskForm'=>$form->createView()
        ]);
    }

    public function removeAction ($id, EntityManagerInterface $em)
    {
        $task = $this->getDoctrine()
            ->getRepository(Task::class)
            ->find($id);
        
        $em->remove($task);
        $em->flush();
        
        return $this->redirectToRoute('listTask');
    }

    public function searchAction(Request $request)
    {
        $tasks = $this->getDoctrine()
            ->getRepository(Task::class)
            ->findByCustomValue($request->query->get('value'));
        
        return $this->render('task/task_list.html.twig', [
            'tasks'=>$tasks
        ]);
    }

    public function test()
    {
        $task = $this->getDoctrine()
            ->getRepository(Task::class)
            ->find(1);
        $create_date = $task->getCreateDate();
        
        return $this->render('task/task_test.html.twig', [
            'task'=>$task,
            'create_date'=>$create_date,
        ]);
    }
}

<?php

namespace AppBundle\Controller;

# we need the `use` statement for our event
use AppBundle\Event\FunEvent;

# we also need to `use` something implementing EventDispatcherInterface
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

# all the other standard `use` statements here
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends AbstractController
{
  /**
   * @Route("/", name="homepage")
   */
  public function indexAction(Request $request, EventDispatcherInterface $eventDispatcher)
  {
      // Symfony 3.3 onwards allows us to easily inject our dependencies
      // directly into controller actions

      // prior to Symfony 3.3, we could grab the event dispatcher from the container
      // $eventDispatcher = $this->get('event_dispatcher');

      $eventDispatcher->dispatch(
          'some.event.name',
          new FunEvent()
      );

      return $this->render('default/index.html.twig', [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
      ]);
  }
}

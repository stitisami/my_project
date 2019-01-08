<?php

// src/AppBundle/Event/Listener/FunEventListener.php

namespace AppBundle\Event\Listener;

use AppBundle\Event\FunEvent;

class FunEventListener
{
    public function onCheeseAndTomatoToasty(FunEvent $event)
    {
        dump($event);
    }
}

<?php

use Phalcon\Mvc\Controller;
use Phalcon\Events\Manager as EventsManager;
use MyApp\handle\Aware;
// defalut controller view
class IndexController extends Controller
{
    public function indexAction()
    {
        //   action to convert 0 into 10
        $eventsManager = new EventsManager();

        $component = new Aware();

        $component->setEventsManager($eventsManager);

        $eventsManager->attach(
            'test',
            new Listner()
        );
        $component->process();
    }
}

<?php

use Phalcon\Mvc\Controller;
use Phalcon\Events\Manager as EventsManager;
use MyApp\handle\Aware;

class SignupController extends Controller
{

    public function IndexAction() 
    {
        // defalut action
    }

    public function registerAction()
    {
        $user = new Users();
        $eventsManager = new EventsManager();
        
        $component= new Aware();

        $component->setEventsManager($eventsManager);
        
        $eventsManager->attach(
            'test',
            new Listner()
        );
       

        $component->process();


      

        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email' 
            ]
        );

        
        $success = $user->save();
        $this->view->success = $success;
        if ($success) {
            $this->view->message = "Register succesfully";
        } else {
            $this->view->message = "Not Register due to following reason: <br>" . implode("<br>", $user->getMessages());
        }
    }
}

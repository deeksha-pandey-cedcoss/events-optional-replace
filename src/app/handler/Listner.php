<?php

use Phalcon\Escaper;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;
use Phalcon\Di\Injectable;

class Listner extends Injectable
{
    public function escaperhtml()
    {
        $escaper = new Escaper();
        $name = $_POST['name'];
        $name1 = $escaper->escapeHtml($_POST['name']);
        $email = $_POST['email'];
        $email1 = $escaper->escapeHtml($_POST['email']);
        if ($name != $name1 || $email != $email1) {
            $_POST['name'] = $name1;
            $_POST['email'] = $email1;
            $adapter = new Stream(APP_PATH . '/logs/main1.log');
            $logger  = new Logger(
                'messages',
                [
                    'main' => $adapter,
                ]
            );

            $logger->info("Name is" . $name1 . "and email is" . $email1);
        } else {
            $_POST['name'] = $name;
            $_POST['email'] = $email;
        }
    }
}

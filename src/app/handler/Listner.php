<?php

use Phalcon\Escaper;

class Listner
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
           
        } else {
            $_POST['name'] = $name;
            $_POST['email'] = $email;
        }




    }
}

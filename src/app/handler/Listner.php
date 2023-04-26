<?php


use Phalcon\Di\Injectable;


class Listner extends Injectable
{
    public function replacenumber()
    {

        $robots = $this->db->fetchAll(
            "SELECT * FROM names",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );
        foreach ($robots as $robot) {
            print_r($robot);
        }

        $success = $this->db->update(
            "names",
            ["quantity"],
            [10],
            "quantity = 0"
        );
        $success1 = $this->db->update(
            "names",
            ["id"],
            [10],
            "id = 0"
        );
        $success2 = $this->db->update(
            "names",
            ["name"],
            ["10"],
            "name = '0'"
        );
    }
}

<?php

class Controller
{
    protected $db;
    protected $f3;
    
    public function __construct()
    {
        $f3 = Base::instance();
        // Connect to the database
        $db = $f3->get('DB');

        // Use database-managed sessions
        // new DB\SQL\Session($db);
        // Save frequently used variables
        $this->db = $db;
        $this->f3 = $f3;
    }
    function afterroute(){
        echo Template::instance()->render('partial/main_layout.html');
    }
}
<?php

class Home extends Controller
{
    function index(BASE $f3){
        
        $f3->set('content', 'index.html');
    }
}
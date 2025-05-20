<?php

namespace src\Controllers;
use src\View\View;

class MainController{
    private $view;
    public function __construct()
    {
        $this->view = new View;   
    }

    public function main(){
        $articles = [
            'article 1'=>[
                'title'=>'Title 1',
                'text'=>'Lorem ipsum',
                'author'=>'nora',
                'date'=>'10-04-2025'
            ],
            'article 2'=>[
                'title'=>'Title 1',
                'text'=>'Lorem ipsum',
                'author'=>'sigurd',
                'date'=>'09-04-2025'
            ]            
        ];
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function sayHello(string $name){
        $this->view->renderHtml('main/hello', ['name'=>$name]);
    }
    public function sayGoogBye(string $name) {
        $this->view->renderHtml('main/goodbye', ['name'=>$name]);
    }
}
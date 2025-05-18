<?php

namespace src\Controllers;
use src\View\View;

class MainController {
    private $view;
    public function __construct() {
        $this->view = new View;
    }
    public function main() {
        $articles = [
            [
                'title' => 'Title 1',
                'text' => 'Lorem ipsum', 
                'author' => 'dasha',
                'date' => '08-08-1998'
            ],
            [
                'title' => 'Title 2',
                'text' => 'Lorem ipsum', 
                'author' => 'dasha',
                'date' => '09-07-1999'
            ]
        ];
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }
    public function sayHello(string $name) {
        $this->view->renderHtml('main/hello', ['name'=>$name]);
    }
    public function sayBye(string $name) {
        $this->view->renderHtml('main/bye', ['name'=>$name]);
    }
}
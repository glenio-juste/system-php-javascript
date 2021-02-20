<?php

class Cidade extends Controller
{

    function __construct()
    {
        parent::__construct();
        // Ver se usa o Auth::autentica();
        $this->view->js = array('cidade/js/cidade.js');
    }

    function index()
    {
        $this->view->title = 'Cidade';
        $this->view->render('header');
        $this->view->render('cidade/index');
        $this->view->render('footer');
    }

    function findAll()
    {
        $this->model->findAll();
    }

    function save()
    {

        $this->model->save();
    }

    function update()
    {
        $this->model->update();
    }

    function delete()
    {
        $this->model->delete();
    }

    function findById()
    {
        $this->model->findById();
    }

    
}

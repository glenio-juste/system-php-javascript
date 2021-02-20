<?php

class Pessoa extends Controller
{

    function __construct()
    {
        parent::__construct();
        // Auth::autentica();
        $this->view->js = array('pessoa/js/pessoa.js');
    }

    function index()
    {
        $this->view->title = 'Pessoa';
        $this->view->render('header');
        $this->view->render('pessoa/index');
        $this->view->render('footer');
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

    function findAll()
    {
        $this->model->findAll();
    }

    function findById()
    {
        $this->model->findById();
    }
}

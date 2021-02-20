<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        // Auth::autentica();
        $this->view->js = array('dashboard/js/dashboard.js');
    }

    function index()
    {
        $this->view->title = 'Dashboard';
        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }

   /*  function save()
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
    } */
}

<?php

namespace Controllers;
abstract class Controller{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        // Initialisation du modèle d'article
        $this->model = new $this->modelName();
    }

    // abstract public function insert();
    // abstract public function delete();
    // abstract public function update();
    // abstract public function select();
}
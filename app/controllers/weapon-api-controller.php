<?php
require_once './app/models/weapon-model.php';
require_once './app/views/api-view.php';

class WeaponApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new WeaponModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getWeapons($params = null) {
        

        if (isset($_GET['sort'])) {

            if (isset($_GET['order'])) {

                $sort = $_GET['sort'];
                $order = $_GET['order'];

                $weapons = $this->model->getAll($sort, $order, null);

                if ($weapons == null){
                    $this->view->response("El campo $sort no existe, o el orden ingresado no es ni ascendente ni descendente", 400);
                }
                else{
                    $this->view->response($weapons);
                }
            }

            else {
                $this->view->response("Por favor, introduzca un orden ascendente o descendente", 400);
            }

        }

        else if (isset($_GET['id_categorie'])){

            $id_categorie = $_GET['id_categorie'];

            $weapons = $this->model->getAll(null, null, $id_categorie);

            if ($weapons == null){
                $this->view->response("La categoria $id_categorie no existe, introuduzca una categoría del 1 al 4", 400);
            }

            else {
            $this->view->response($weapons);
            }
        }

        else {
            $weapons = $this->model->getAll();
            $this->view->response($weapons);
        }

        

    }



    public function getWeapon($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $weapon = $this->model->get($id);

        // si no existe devuelvo 404
        if ($weapon)
            $this->view->response($weapon);
        else 
            $this->view->response("El arma con el id=$id no existe", 404);
    }

    public function deleteWeapon($params = null) {
        $id = $params[':ID'];

        $weapon = $this->model->get($id);
        if ($weapon) {
            $this->model->delete($id);
            $this->view->response($weapon);
        } else 
            $this->view->response("El arma con el id=$id no existe", 404);
    }

    public function insertWeapon($params = null) {
        $weapon = $this->getData();

        if (empty($weapon->weapon_name) || empty($weapon->id_categorie) || empty($weapon->price) || empty($weapon->damage) || empty($weapon->bullets) || empty($weapon->reach)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insert($weapon->weapon_name, $weapon->id_categorie, $weapon->price, $weapon->damage, $weapon->bullets, $weapon->reach);
            $this->view->response("El arma se insertó con éxito con el id=$id", 201);
        }
    }

    public function editWeapon($params = null) {
        $id = $params[':ID'];

            $weapon = $this->model->get($id);
            $editedData = $this->getData();
            if ($weapon) {
                if (empty($editedData->weapon_name) || empty($editedData->id_categorie) || empty($editedData->price) || empty($editedData->damage) || empty($editedData->bullets) || empty($editedData->reach)){
                    $this->view->response("Complete los datos", 400);
                } else{
                    $this->model->edit($editedData->weapon_name, $editedData->id_categorie, $editedData->price, $editedData->damage, $editedData->bullets, $editedData->reach, $id);
                    $this->view->response($weapon);
                }
            } else 
                $this->view->response("El arma con el id=$id no existe", 404);
    }

}
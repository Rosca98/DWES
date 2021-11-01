<?php
require_once("view.php");
require_once("models/resources.php");


class ResourceController {

    /**
     * Constructor de la clase
     */
    public function __construct() {
        $this->view = new View();
        $this->resource = new Resource();
    }

    /**
     * Muestra lista de Recursos
     */
    public function showResourcesList() {
        $this->view->show("resources/showAllResources");
    }

    /**
     * Muestra el formulario para añadir recursos
     */
    public function showAddResource() {
        $this->view->show("resources/showAddResources");
    }

    /**
     * Muestra el formulario para modificar recursos
     */
    public function showModResource() {
        $this->view->show("resources/showModResources");
    }

    /**
     * Procesamos la informacion para añadir el nuevo recurso
     */
    public function processAddResource() {
        $name = $_REQUEST['resource_name'];
        $desc = $_REQUEST['resource_desc'];
        $location = $_REQUEST['resource_location'];

        $target_path = 'F:/xampp/htdocs/2daw/reserva/assets/img/';
        $target_path = $target_path . basename($_FILES['img_upload']['name']);
        if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $target_path)) {
            $img_ruta = "http://localhost/2daw/reserva/assets/img/" . basename($_FILES['img_upload']['name']);
        } else {
            echo "Error";
        }
        $this->resource->addResource($name, $desc, $location, $img_ruta);
        header('Location: index.php?controller=resourceController&action=showResourcesList');
    }

    /**
     * Eliminar el recurso
     */
    public function eliminarResource() {
        $id = $_REQUEST['id_resource'];
        $this->resource->deleteResource($id);
        //Volver a la lista de Resources
        header('Location: index.php?controller=resourceController&action=showResourcesList');
    }

    /**
     * Modificar el recurso
     */
    public function ProcessModifyResource() {
        $id = $_REQUEST["resource_id"];
        $name = $_REQUEST["resource_name"];
        $desc = $_REQUEST["resource_desc"];
        $location = $_REQUEST["resource_location"];


        //¿Hay imagen subida?
        if (isset($_FILES["img_upload"])) {
            //Si la hay se mueve a carpeta y se establece como imagen
            $target_path = 'F:/xampp/htdocs/2daw/reserva/assets/img/';
            $target_path = $target_path . basename($_FILES['img_upload']['name']);
            if (move_uploaded_file($_FILES['img_upload']['tmp_name'], $target_path)) {
                $img_ruta = "http://localhost/2daw/reserva/assets/img/" . basename($_FILES['img_upload']['name']);
            } else {
                echo "Error";
            }
        } else {
            // Si no la hay, será el enlace
            $img_ruta = $_REQUEST["img_link"];
        }
        $this->resource->ModifyResource($id, $name, $desc, $location, $img_ruta);
        header('Location: index.php?controller=resourceController&action=showResourcesList');
    }
}

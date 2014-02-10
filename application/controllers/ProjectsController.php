<?php

class ProjectsController extends \Phalcon\Mvc\Controller {
   
    public function indexAction() {
        //Assign the projects to the view:
        $this->view->setVar('projects', Project::find());
    }
    
    public function viewAction( $id ) {}
    
    
}


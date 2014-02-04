<?php

class ProjectsController extends \Phalcon\Mvc\Controller {
   
    public function viewAllAction() {
        //Projects:
        $projects = array(
            1 => new Project(1, 'Homepage', 'The personal homepage for myself.', 'Sindre Njøsen'),
            2 => new Project(1, 'PhalconPHP searchmodule', 'A searchmodule for PhalconPHP using the Spinx-search-extension', 'Sindre Njøsen')
        );
        
        //Assign the projects to the view:
        $this->view->setVar('projects', $projects);
    }
    
    public function viewAction( $id ) {}
    
    
}


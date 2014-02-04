<?php
class IndexController extends \Phalcon\Mvc\Controller {
    
    public function indexAction() {
        $posts = new Post();
        
        $this->view->setVar('username', $this->session->get('auth')['username']);
        $this->view->setVar('posts', $posts->getAllOrderByNewest());
        //Remember to set the page-title:
        $this->view->setVar('pageTitle', 'Home');
    }
  
    public function aboutAction() {
        echo "Test of session.";
        if( isset( $this->session->get('auth')['username'] ) ) {
            echo "Hello, this is the secret message! The answer to life the universe and everything.: 42.";
        } else {
            echo "You have no access here.";
        }
        
        //Remember to set the page-title:
        $this->view->setVar('pageTitle', 'About');
    }
    
    public function loginAction() {
        echo "Hello!";
    }
}

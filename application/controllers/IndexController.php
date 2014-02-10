<?php
class IndexController extends \Phalcon\Mvc\Controller {
    
    public function indexAction() {
        //Get posts and paginate them:
        $posts = new Post();
        $pagPosts = new \Phalcon\Paginator\Adapter\Model(
            array(
                "data"  => $posts->getAllOrderByNewest(), //The posts
                "limit" => 4, //Total number of posts
                "page"  => $this->request->getQuery('page', 'int') //The current page
            )
        );
        
        $this->view->setVar('username', $this->session->get('auth')['username']);
        $this->view->setVar('page', $pagPosts->getPaginate());
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

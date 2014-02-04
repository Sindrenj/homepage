<?php

class PostsController extends \Phalcon\Mvc\Controller {
    
    public function indexAction() {
        //Find all the posts:
        $posts = new Post();
        $this->view->setVar('posts', $posts->find());
    }
    
    public function createAction() {
        if( $this->request->isPost() ) {
            $post = new Post();
            //Get the request-data:
            $post->set("headline", $this->request->getPost('txtHeadline'));
            $post->set("content", $this->request->getPost('txtContent'));
            $post->set("createdBy", 0);
            $post->set("created", null);
            //Create the post:
            if( $post->create() ) {
                $this->flash->success("The post was correctly saved!");
            } else {
               //The standard error message:
               $msg = "Sorry, the following problems were generated: ";
               //Get all the errors:
                    foreach ( $post->getMessages() as $message ) {
                        $msg .= $message->getMessage() . "<br/>";
                    }
               //Display the error as a flash
               $this->flash->error($msg);
            }
        }
    }
    
    public function editAction( $id ) {
        //Find post(s)
        $this->view->setVar('post', Post::findFirst(array('id =' . $id )));
        $this->view->setVar('posts', Post::find());
    }
    
    public function updateAction() {
        
    }
    
    public function deleteAction( $id ) {
        
    }
    
    
}


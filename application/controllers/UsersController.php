<?php

class UsersController extends \Phalcon\Mvc\Controller {
    
    public function createAction() {
        if ( $this->request->isPost() ) {
            $user = new User();
            //Assign the values to the object:
            $user->setFirstname($this->request->getPost('firstname'));
            $user->setLastname($this->request->getPost('lastname'));
            $user->setEmail($this->request->getPost('email'));
            //Hash the password before saving:
            $hash = $this->security->hash($this->request->getPost('password'));
            $user->setPassword($hash);           
            //Store a new User in the data-storage:
            if($user->create()) { //The user were successfully created:
                echo "The user were created!";
            } else { //Error, the user could not be created:
                echo "An error occured during the registrationprocess: <br>";
                $messages = $user->getMessages();
                foreach($messages as $m) {
                    echo $m->getMessage() . "<br>";
                }
            }
        } 
    }
    
    public function loginAction() {
        if( $this->request->isPost() ) {
            //Get the login-information:
            $email = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            //Find the user in the database:
            //Prepare statements are used, so that no SQL-injection could happen.
            $user = User::findFirst( array("email = :email:", "bind" => array('email' => $email )
                ) 
            );
            //Check if the user exists:
            if ( $user ) { //Found the user:
               //Verify the password:
                $correct = $this->security->checkHash( $password, $user->get('password') );
                $user->setRole(1);
                //Check if correct:
                if( $correct ) {
                    echo "Welcome " . $user->get('firstname') . " " . $user->get('lastname') . "!";
                    $this->createSession( $user );
                } else {
                    echo "Wrong password!";
                }
            } else { //Wrong password or username, deny.
                echo "The user could not be found!";
            }
        } 
    }
    
    public function createSession( $user ) {
        //Set the username and the role:
        $this->session->set( 'auth', array(
                             'username' => $user->get('email'),
                             'role' => $user->get('role')
                            ));              
    }
    
    /*
     * logoutAction - Destroys the session, so the user is not logged in anymore.
     */
    public function logoutAction() {
        $this->session->destroy();
    }
    
    public function registerAction() {

    }
}

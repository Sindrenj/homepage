<?php
    /** =====================================================
     *  index.php - The bootstrap-file:
     *  This is the main application file for the application.
     *  =====================================================
     *  Author: sindrenj
     */

    try {
        //Register an autoloader:
        $loader = new \Phalcon\Loader();
        //Register the directories:
        $loader->registerDirs( array(
            '../application/controllers/',
            '../application/models/'
        ))->register();
        
        //Create the DI-container:
        $di = new Phalcon\DI\FactoryDefault();
        
        //Setup the view-component:
        $di->set('view', function() {
            $view = new \Phalcon\Mvc\View();
            //Define the views/template path:
            $view->setViewsDir('../application/views/');
            //We need the volt-engine as well..
            $view->registerEngines(array(
                ".phtml" => 'Phalcon\Mvc\View\Engine\Volt'
            ));
            
            return $view;
        });
        
        //Setup the base URI, so the uris includes the main folder.
        $di->set('url', function() {
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri('/HomePage/');
            return $url;
        });
        
        //Setup the flash-service:
        $di->set('flash', function() {
            return new \Phalcon\Flash\Direct();
        });
        
        //Setup the database service
        $di->set('db', function(){
            return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                "host" => "localhost",
                "username" => "root",
                "password" => "",
                "dbname" => "PhalconDebate"
            ));
        });
        
        //Setup the security-component:
        $di->set('security', function(){
            //Initialize the security-component:
            $security = new Phalcon\Security();
            //Set the password hashing factor to 12 rounds:
            $security->setWorkFactor(12);
            return $security;
        }, true);
        
        //Setup the session-wrapper:
        //Hver gang session-komponenten kreves, startes session.
        //På den måten trenger vi ikke å kalle på session->start
        //Hver gang session-variabelen skal skapes/brukes.
        $di->setShared('session', function() {
            $session = new Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        });
        
        //Handle the request:
        $application = new \Phalcon\Mvc\Application($di);
        
        //Create the page:
        echo $application->handle()->getContent();
        
    } catch (\Phalcon\Exception $e) {
        //Error in the application
        echo "<div style='border: 3px solid red; padding: 10px; margin: 20px;'><b>Error:</b> " . $e->getMessage() . "</div>";
    }

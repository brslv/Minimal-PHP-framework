<?php

class User {
    
    private $username;
    
    /**
     * 
     * @return string Say hi message.
     */
    public function sayHi(){
        return $this->username . ' says hi!';
    }
    
    /**
     * User::username setter.
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
            
}

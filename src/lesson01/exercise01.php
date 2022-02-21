<?php

class User
{
    private $name;
    private $email;
    private $birthday;
    private $userId;
    private $comments;

    public function __construct($name, $email, $birthday, $userId, $comments = "")
    {
        $this->name = $name;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->userId = $userId;
        $this->comments[] = $comments;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }


    public function getUserId()
    {
        return $this->userId;
    }


    public function getComments()
    {
        return $this->comments;
    }

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }

}


Class Moderator extends User {

    public function removeComment($userName, $commentId) {
        // some code;
    }

}

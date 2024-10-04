<?php

namespace App\models;

class LoginModel extends Model 
{
    protected $id;
    protected $name;
    protected $firstname;
    protected $email;
    protected $password;
    protected $id_role;

    /**
     * Initializes the LoginModel instance.
     *
     * Sets the table property to reference the Users table in the database.
     */
    public function __construct()
    {
        $this->table = 'Users';
    }

    /**
     * Searches for a user by email, returning user and role information.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param string $email The email address of the user to search for.
     * @return object|false Returns an object representing the user, or false on failure.
     */
    public function search($email)
    {
        return $this->req(
            "SELECT u.id, u.name, u.firstname, u.password, r.role 
             FROM Users u 
             JOIN Role r ON u.id_role = r.id 
             WHERE u.email = :email",
            ['email' => $email]
        )->fetch();
    }

    // Getters and Setters

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname.
     *
     * @param string $firstname
     * @return self
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of id_role.
     *
     * @return integer
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role.
     *
     * @param integer $id_role
     * @return self
     */
    public function setIdRole($id_role): self
    {
        $this->id_role = $id_role;
        return $this;
    }
}
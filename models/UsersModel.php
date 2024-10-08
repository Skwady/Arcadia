<?php

namespace App\models;

class UsersModel extends Model
{
    protected $id;
    protected $name;
    protected $firstname;
    protected $email;
    protected $password;
    protected $dob;
    protected $id_role;

    /**
     * Initializes the UsersModel instance.
     *
     * Sets the table property to reference the Users table in the database.
     */
    public function __construct()
    {
        $this->table = 'Users';
    }

    /**
     * Creates a new user in the database.
     *
     * Executes an INSERT query to add a new user to the Users table.
     *
     * @param string $name The name of the user.
     * @param string $firstname The first name of the user.
     * @param string $email The email address of the user.
     * @param string $password The password of the user.
     * @param integer $id_role The role ID of the user.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function createUser($name, $firstname, $email, $password, $id_role)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (name, firstname, email, password, id_role) 
             VALUES (:name, :firstname, :email, :password, :id_role)", 
            [
                'name' => $name,
                'firstname' => $firstname,
                'email' => $email,
                'password' => $password,
                'id_role' => $id_role
            ]
        );    
    }

    /**
     * Retrieves the ID of a role by its name.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param string $role The name of the role to find.
     * @return object|false Returns an object representing the role, or false on failure.
     */
    public function selectRole($role)
    {
        return $this->req("SELECT id FROM Role WHERE role = :role", ['role' => $role])->fetch();
    }

    /**
     * Retrieves all users along with their roles.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @return array|false Returns an array of user objects with role information, or false on failure.
     */
    public function selectAll()
    {
        $sql = "
        SELECT 
            u.id, 
            u.name, 
            u.firstname, 
            u.email, 
            u.dob, 
            r.role AS role
        FROM 
            {$this->table} u 
        LEFT JOIN 
            Role r ON u.id_role = r.id";
        return $this->req($sql)->fetchAll();
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
     * Get the value of dob.
     *
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob.
     *
     * @param string $dob
     * @return self
     */
    public function setDob($dob): self
    {
        $this->dob = $dob;
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
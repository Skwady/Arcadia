<?php

namespace App\models;

class RoleModel extends Model
{
    protected $id;
    protected $role;  

    /**
     * Initializes the RoleModel instance.
     *
     * Sets the table property to reference the Role table in the database.
     */
    public function __construct()
    {
        $this->table = 'Role'; 
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
     * Get the value of role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role.
     *
     * @param string $role
     * @return self
     */
    public function setRole($role): self
    {
        $this->role = $role;
        return $this;
    }
}
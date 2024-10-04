<?php

namespace App\models;

class ServiceModel extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $slug;
    protected $id_users;

    /**
     * Initializes the ServiceModel instance.
     *
     * Sets the table property to reference the Service table in the database.
     */
    public function __construct()
    {
        $this->table = 'Service';
    }

    /**
     * Adds a new service to the database.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param string $name The name of the service.
     * @param string $description A description of the service.
     * @param integer $id_users The ID of the user associated with the service.
     * @param string $slug A URL-friendly identifier for the service.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function addService($name, $description, $id_users, $slug)
    {
        return $this->req(
            "INSERT INTO $this->table (name, description, id_users, slug) VALUES (:name, :description, :id_users, :slug)",
            [
                'name' => $name,
                'description' => $description,
                'id_users' => $id_users,
                'slug' => $slug
            ]
        );
    }

    /**
     * Retrieves all services from the database.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @return array|false Returns an array of service objects, or false on failure.
     */
    public function getAllServices()
    {
        return $this->req(
            "SELECT s.*, u.name as user_name 
            FROM $this->table s 
            LEFT JOIN Users u ON s.id_users = u.id"
        )->fetchAll();
    }

    /**
     * Retrieves a service by its ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the service to retrieve.
     * @return object|false Returns an object representing the service, or false on failure.
     */
    public function getServiceById($id)
    {
        return $this->req("SELECT * FROM $this->table WHERE id = ?", [$id])->fetch();
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
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug.
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get the value of id_users.
     *
     * @return integer
     */
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * Set the value of id_users.
     *
     * @param integer $id_users
     * @return self
     */
    public function setIdUsers($id_users): self
    {
        $this->id_users = $id_users;
        return $this;
    }
}
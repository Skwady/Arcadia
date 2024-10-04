<?php

namespace App\models;

class HabitatModel extends Model
{
    protected $id;
    protected $name;
    protected $slug;
    protected $description;

    /**
     * Initializes the HabitatModel instance.
     *
     * Sets the table property to reference the Habitat table in the database.
     */
    public function __construct()
    {
        $this->table = 'Habitat';
    }

    /**
     * Retrieves a habitat by its ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the habitat to retrieve.
     * @return object|false Returns an object representing the habitat, or false on failure.
     */
    public function getHabitatById($id)
    {
        return $this->req("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch();
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
}

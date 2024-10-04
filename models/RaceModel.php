<?php

namespace App\models;

use App\models\Model;

class RaceModel extends Model
{
    protected $id;
    protected $race;

    /**
     * Initializes the RaceModel instance.
     *
     * Sets the table property to reference the Race table in the database.
     */
    public function __construct()
    {
        $this->table = 'Race';
    }

    /**
     * Retrieves a race by its ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the race to retrieve.
     * @return object|false Returns an object representing the race, or false on failure.
     */
    public function getRaceById($id)
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
     * Get the value of race.
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race.
     *
     * @param string $race
     * @return self
     */
    public function setRace($race): self
    {
        $this->race = $race;
        return $this;
    }
}

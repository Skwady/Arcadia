<?php

namespace App\models;

class HoraireModel extends Model
{
    protected $id;
    protected $horaire;

    /**
     * Initializes the HoraireModel instance.
     *
     * Sets the table property to reference the Horaire table in the database.
     */
    public function __construct()
    {
        $this->table = 'Horaire';
    }

    /**
     * Updates an existing schedule by its ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the schedule to update.
     * @param string $horaire The updated schedule.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function updateHoraire($id, $horaire)
    {
        $sql = "UPDATE " . $this->table . " SET horaire = :horaire WHERE id = :id";
        return $this->req($sql, [
            'id' => $id,
            'horaire' => $horaire
        ]);
    }

    /**
     * Retrieves all schedules from the database.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @return array|false Returns an array of schedule objects, or false on failure.
     */
    public function getAllHoraires()
    {
        return $this->req("SELECT * FROM " . $this->table)->fetchAll();
    }

    /**
     * Retrieves a schedule by its ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the schedule to retrieve.
     * @return object|false Returns an object representing the schedule, or false on failure.
     */
    public function getHoraireById($id)
    {
        return $this->req("SELECT * FROM " . $this->table . " WHERE id = ?", [$id])->fetch();
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
     * Get the value of horaire.
     *
     * @return string
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set the value of horaire.
     *
     * @param string $horaire
     * @return self
     */
    public function setHoraire($horaire): self
    {
        $this->horaire = $horaire;
        return $this;
    }
}
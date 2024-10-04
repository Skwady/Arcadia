<?php

namespace App\models;

class AnimalModel extends Model
{
    protected $id;
    protected $name;
    protected $age;
    protected $slug;
    protected $visits;
    protected $description;
    protected $dyk; // "Do You Know" information
    protected $id_race;
    protected $id_habitat;

    public function __construct()
    {
        $this->table = 'Animal';
    }

    /**
     * Adds a new animal to the database.
     *
     * @param string $name The name of the animal.
     * @param integer $age The age of the animal.
     * @param string $slug The slug for the animal (image URL).
     * @param string $description The description of the animal.
     * @param string $dyk The "Do You Know" information.
     * @param integer $id_race The race ID of the animal.
     * @param integer $id_habitat The habitat ID of the animal.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function addAnimal($name, $age, $slug, $description, $dyk, $id_race, $id_habitat)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (name, age, slug, description, dyk, id_race, id_habitat) 
             VALUES (:name, :age, :slug, :description, :dyk, :id_race, :id_habitat)", 
            [
                'name' => $name,
                'age' => $age,
                'slug' => $slug,
                'description' => $description,
                'dyk' => $dyk,
                'id_race' => $id_race,
                'id_habitat' => $id_habitat
            ]
        );  
    }

    /**
     * Retrieves an animal by its ID, including race and habitat details.
     *
     * @param integer $id The ID of the animal to retrieve.
     * @return object|false Returns an object representing the animal, or false on failure.
     */
    public function getAnimalById($id)
    {
        $sql = "
            SELECT 
                a.*, 
                r.race AS race_name,
                h.name AS habitat_name
            FROM 
                {$this->table} a
            LEFT JOIN 
                Race r ON a.id_race = r.id
            LEFT JOIN 
                Habitat h ON a.id_habitat = h.id
            WHERE 
                a.id = ?";
        return $this->req($sql, [$id])->fetch();
    }

    /**
     * Retrieves all animals by habitat ID.
     *
     * @param integer $id_habitat The habitat ID to filter animals by.
     * @return array|false Returns an array of animal objects, or false on failure.
     */
    public function getAnimalsByHabitat($id_habitat)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_habitat = ?";
        return $this->req($sql, [$id_habitat])->fetchAll();
    }

    /**
     * Retrieves all animals with their race and habitat details.
     *
     * @return array|false Returns an array of animal objects with details, or false on failure.
     */
    public function getAllAnimalsWithDetails()
    {
        $sql = "
            SELECT 
                a.id, 
                a.name, 
                a.age, 
                a.slug, 
                a.visits,
                a.description,
                a.dyk, 
                r.race AS race_name, 
                h.name AS habitat_name
            FROM 
                {$this->table} a 
            LEFT JOIN 
                Race r ON a.id_race = r.id 
            LEFT JOIN 
                Habitat h ON a.id_habitat = h.id";
        return $this->req($sql)->fetchAll();
    }

    /**
     * Retrieves detailed information of an animal including associated reports.
     *
     * @param integer $id The ID of the animal.
     * @return object|false Returns an object with the animal details, or false on failure.
     */
    public function getAnimalsWithDetails($id)
    {
        $sql = "
            SELECT 
                a.id, 
                a.name, 
                a.age, 
                a.slug, 
                a.description,
                a.dyk,
                r.race AS race, 
                h.name AS habitat,
                rap.*
            FROM 
                {$this->table} a
            LEFT JOIN 
                Race r ON a.id_race = r.id 
            LEFT JOIN 
                Habitat h ON a.id_habitat = h.id
            LEFT JOIN 
                Rapport rap ON a.id = rap.id_animal
            WHERE a.id = :id";
            
        return $this->req($sql, ['id' => $id])->fetch();
    }

    /**
     * Finds the race ID by the race name.
     *
     * @param string $raceName The name of the race.
     * @return integer|null Returns the race ID or null if not found.
     */
    public function findRaceIdByName($raceName)
    {
        $result = $this->req("SELECT id FROM Race WHERE race = ?", [$raceName])->fetch();
        return $result ? $result->id : null;
    }

    /**
     * Finds the habitat ID by the habitat name.
     *
     * @param string $habitatName The name of the habitat.
     * @return integer|null Returns the habitat ID or null if not found.
     */
    public function findHabitatIdByName($habitatName)
    {
        $result = $this->req("SELECT id FROM Habitat WHERE name = ?", [$habitatName])->fetch();
        return $result ? $result->id : null;
    }

    /**
     * Increments the visits count for an animal by its ID.
     *
     * @param integer $id The ID of the animal to update.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function incrementVisits(int $id)
    {
        $sql = 'UPDATE ' . $this->table . ' SET visits = visits + 1 WHERE id = ?';
        return $this->req($sql, [$id]);
    }

    // Getters and Setters

    public function getId() {
        return $this->id;
    }

    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name): self {
        $this->name = $name;
        return $this;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age): self {
        $this->age = $age;
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug): self {
        $this->slug = $slug;
        return $this;
    }

    public function getVisits() {
        return $this->visits;
    }

    public function setVisits($visits): self {
        $this->visits = $visits;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    public function getDyk() {
        return $this->dyk;
    }

    public function setDyk($dyk): self {
        $this->dyk = $dyk;
        return $this;
    }

    public function getIdRace() {
        return $this->id_race;
    }

    public function setIdRace($id_race): self {
        $this->id_race = $id_race;
        return $this;
    }

    public function getIdHabitat() {
        return $this->id_habitat;
    }

    public function setIdHabitat($id_habitat): self {
        $this->id_habitat = $id_habitat;
        return $this;
    }
}

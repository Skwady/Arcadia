<?php

namespace App\models;

class RapportModel extends Model
{
    protected $id;
    protected $name;
    protected $dates;
    protected $states;
    protected $recommended_food;
    protected $recommended_weight;
    protected $food_given;
    protected $quantity_donated;
    protected $commentaire;
    protected $id_users;
    protected $id_animal;

    /**
     * Initializes the RapportModel instance.
     *
     * Sets the table property to reference the Rapport table in the database.
     */
    public function __construct()
    {
        $this->table = 'Rapport';
    }

    /**
     * Creates a new rapport in the database.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param array $data An associative array containing rapport data.
     * @return PDOStatement|false Returns a PDOStatement on success, or false on failure.
     */
    public function createRapport($data)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (name, dates, states, recommended_food, recommended_weight, food_given, quantity_donated, commentaire, id_users, id_animal) 
            VALUES (:name, :dates, :states, :recommended_food, :recommended_weight, :food_given, :quantity_donated, :commentaire, :id_users, :id_animal)",
            [
                'name' => $data['name'],
                'dates' => $data['dates'],
                'states' => $data['states'],
                'recommended_food' => $data['recommended_food'],
                'recommended_weight' => $data['recommended_weight'],
                'food_given' => $data['food_given'],
                'quantity_donated' => $data['quantity_donated'],
                'commentaire' => $data['commentaire'],
                'id_users' => $data['id_users'],
                'id_animal' => $data['id_animal']
            ]
        );
    }

    /**
     * Retrieves all rapports by animal ID.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id_animal The ID of the animal.
     * @return array|false Returns an array of rapport objects, or false on failure.
     */
    public function getRapportsByAnimal($id_animal)
    {
        return $this->req(
            "SELECT * FROM " . $this->table . " WHERE id_animal = ?",
            [$id_animal]
        )->fetchAll();
    }

    /**
     * Retrieves a specific rapport by its ID, including user and animal details.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @param integer $id The ID of the rapport.
     * @return object|false Returns an object representing the rapport with details, or false on failure.
     */
    public function getRapportById($id)
    {
        return $this->req(
            "SELECT r.*, u.name as userName, a.name as animalName 
             FROM " . $this->table . " r 
             LEFT JOIN Users u ON r.id_users = u.id 
             LEFT JOIN Animal a ON r.id_animal = a.id 
             WHERE r.id = ?",
            [$id]
        )->fetch();
    }

    /**
     * Retrieves all rapports from the database, including user and animal details.
     *
     * Uses the default fetch mode (object) set in the database connection.
     *
     * @return array|false Returns an array of rapport objects with related user and animal details, or false on failure.
     */
    public function getAllRapports()
    {
        return $this->req(
            "SELECT r.*, u.name as user_name, a.name as animal_name
             FROM " . $this->table . " r
             LEFT JOIN Users u ON r.id_users = u.id
             LEFT JOIN Animal a ON r.id_animal = a.id"
        )->fetchAll();
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
     * Get the value of dates.
     *
     * @return string
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set the value of dates.
     *
     * @param string $dates
     * @return self
     */
    public function setDates($dates): self
    {
        $this->dates = $dates;
        return $this;
    }

    /**
     * Get the value of states.
     *
     * @return string
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Set the value of states.
     *
     * @param string $states
     * @return self
     */
    public function setStates($states): self
    {
        $this->states = $states;
        return $this;
    }

    /**
     * Get the value of recommended_food.
     *
     * @return string
     */
    public function getRecommendedFood()
    {
        return $this->recommended_food;
    }

    /**
     * Set the value of recommended_food.
     *
     * @param string $recommended_food
     * @return self
     */
    public function setRecommendedFood($recommended_food): self
    {
        $this->recommended_food = $recommended_food;
        return $this;
    }

    /**
     * Get the value of recommended_weight.
     *
     * @return string
     */
    public function getRecommendedWeight()
    {
        return $this->recommended_weight;
    }

    /**
     * Set the value of recommended_weight.
     *
     * @param string $recommended_weight
     * @return self
     */
    public function setRecommendedWeight($recommended_weight): self
    {
        $this->recommended_weight = $recommended_weight;
        return $this;
    }

    /**
     * Get the value of food_given.
     *
     * @return string
     */
    public function getFoodGiven()
    {
        return $this->food_given;
    }

    /**
     * Set the value of food_given.
     *
     * @param string $food_given
     * @return self
     */
    public function setFoodGiven($food_given): self
    {
        $this->food_given = $food_given;
        return $this;
    }

    /**
     * Get the value of quantity_donated.
     *
     * @return string
     */
    public function getQuantityDonated()
    {
        return $this->quantity_donated;
    }

    /**
     * Set the value of quantity_donated.
     *
     * @param string $quantity_donated
     * @return self
     */
    public function setQuantityDonated($quantity_donated): self
    {
        $this->quantity_donated = $quantity_donated;
        return $this;
    }

    /**
     * Get the value of commentaire.
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire.
     *
     * @param string $commentaire
     * @return self
     */
    public function setCommentaire($commentaire): self
    {
        $this->commentaire = $commentaire;
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

    /**
     * Get the value of id_animal.
     *
     * @return integer
     */
    public function getIdAnimal()
    {
        return $this->id_animal;
    }

    /**
     * Set the value of id_animal.
     *
     * @param integer $id_animal
     * @return self
     */
    public function setIdAnimal($id_animal): self
    {
        $this->id_animal = $id_animal;
        return $this;
    }
}
<?php

namespace App\models;

use App\config\MongoBase;
use MongoDB\BSON\ObjectId;

class EvenementModel extends MongoBase
{
    private $collection;

    /**
     * Initializes the EvenementModel instance.
     *
     * Sets up a connection to the 'evenement' collection in the 'Arcadia' database.
     */
    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->getCollection('Arcadia', 'evenement');
    }

    /**
     * Retrieves an event by its ID.
     *
     * @param string $id The ID of the event to retrieve.
     * @return object|null Returns an object representing the event, or null if not found.
     */
    public function getEvenementById($id)
    {
        return $this->collection->findOne(['_id' => new ObjectId($id)]);
    }

    /**
     * Retrieves all events from the collection.
     *
     * @return array Returns an array of event objects.
     */
    public function getAllEvenement()
    {
        return $this->collection->find()->toArray();
    }

    /**
     * Updates an event by its ID.
     *
     * @param string $id The ID of the event to update.
     * @param string $description The updated description.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateEvenement($id, $description)
    {
        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => ['description' => $description]]
        );

        return $result->getModifiedCount() === 1;
    }
}

<?php

namespace App\models;

use App\config\MongoBase;
use MongoDB\BSON\ObjectId;

class AvisModel extends MongoBase
{
    private $collection;

    /**
     * Initializes the AvisModel instance.
     *
     * Sets up a connection to the 'avis' collection in the 'Arcadia' database.
     */
    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->getCollection('Arcadia', 'avis');
    }

    /**
     * Retrieves all reviews that are visible.
     *
     * @return array Returns an array of visible review objects.
     */
    public function getAvis()
    {
        $options = [
            'typeMap' => [
                'root' => 'object',  // Return documents as objects
                'document' => 'object'
            ]
        ];

        return $this->collection->find(['isVisible' => true], $options)->toArray();
    }

    /**
     * Adds a review with isVisible set to false by default.
     *
     * @param string $pseudo The pseudo of the reviewer.
     * @param string $commentaire The content of the review.
     * @return bool Returns true if the review was added successfully, false otherwise.
     */
    public function addAvis($pseudo, $commentaire)
    {
        $result = $this->collection->insertOne([
            'pseudo' => $pseudo,
            'commentaire' => $commentaire,
            'isVisible' => false
        ]);

        return $result->getInsertedCount() === 1;
    }

    /**
     * Retrieves all reviews from the collection.
     *
     * @return array Returns an array of all review objects.
     */
    public function getAllAvis()
    {
        $options = [
            'typeMap' => [
                'root' => 'object',
                'document' => 'object'
            ]
        ];

        return $this->collection->find([], $options)->toArray();
    }

    /**
     * Approves a review by setting isVisible to true.
     *
     * @param string $id The ID of the review to approve.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function authorizeAvis($id)
    {
        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => ['isVisible' => true]]
        );

        return $result->getModifiedCount() === 1;
    }

    /**
     * Deletes a review from the collection by its ID.
     *
     * @param string $id The ID of the review to delete.
     * @return bool Returns true if the deletion was successful, false otherwise.
     */
    public function deleteAvis($id)
    {
        $result = $this->collection->deleteOne(['_id' => new ObjectId($id)]);

        return $result->getDeletedCount() === 1;
    }
}
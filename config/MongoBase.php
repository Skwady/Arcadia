<?php

namespace App\config;

use MongoDB\Client;

class MongoBase
{
    protected $client;

    /**
     * Initializes the MongoBase instance.
     *
     * Establishes a connection to MongoDB.
     */
    public function __construct()
    {
        $this->client = $this->connect();
    }

    /**
     * Manages the connection to MongoDB.
     *
     * @return Client Returns the MongoDB client instance.
     */
    protected function connect()
    {
        try {
            // Connect to MongoDB Atlas via the URI
            return new Client($_ENV["MONGODB_URI"]);
        } catch (\Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    /**
     * Retrieves a collection from the specified database.
     *
     * @param string $database The name of the database.
     * @param string $collection The name of the collection.
     * @return MongoDB\Collection The specified collection.
     */
    protected function getCollection($database, $collection)
    {
        return $this->client->$database->$collection;
    }
}
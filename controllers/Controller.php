<?php

namespace App\controllers;

abstract class Controller 
{
    /**
     * Renders a view file.
     *
     * This method is responsible for rendering a specific view file and optionally passing data to it.
     * It extracts the provided data to make the variables accessible within the view, captures the
     * content of the view using output buffering, and includes a default layout (header/footer) around
     * the content.
     *
     * @param string $file The path to the view file relative to the views directory.
     * @param array $donnees An associative array of data to be passed to the view.
     * @return void Outputs the final rendered view.
     */
    public function render(string $file, array $donnees = [])
    {
        // Extract data to make each key a variable in the view
        extract($donnees);

        // Start output buffering to keep the file content in memory
        ob_start();
        
        // Include the view file
        require_once ROOT.'/views/'.$file.'.php';

        // Store the buffered content of the view in the variable
        $contenu = ob_get_clean();
        
        // Include the default layout which contains the header and footer
        require_once ROOT.'/views/default.php';
    }
}
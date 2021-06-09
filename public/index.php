<?php

// Slim Framework
// Doc URL: https://www.slimframework.com
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

// Stichoza Google TranslatePHP
// https://github.com/Stichoza/google-translate-php
use Stichoza\GoogleTranslate\GoogleTranslate;

// Directory with Composer autoload.php file
require __DIR__ . '/../vendor/autoload.php';

// Create App
$app = AppFactory::create();

// Base path handler: should be changed in production
$app->setBasePath("/oat/public");


// Get Method for Questions
$app->get('/questions', function (Request $request, Response $response, array $args) {
    
    // Checks
    $json_file_check = __DIR__ . '/../data/questions.json';
    $csv_file_check = __DIR__ . '/../data/questions.csv';
    
    // Process
    // Check if JSON exists
    if(file_exists($json_file_check)) {
        $get_json = file_get_contents( __DIR__ . '/../data/questions.json');
        $json_file = json_decode($get_json, true);
        
        $renderer = new PhpRenderer( __DIR__ . '/templates/');
        return $renderer->render($response, "questionsListView.php", ['json_file' => $json_file]);

    } 
    // Check if CSV exists and JSON doesn't
    elseif (!file_exists($json_file_check) && file_exists($csv_file_check)) {
        $rows   = array_map('str_getcsv', file($csv_file_check));
        $header = array_shift($rows);
        $csv_file    = array();
        foreach($rows as $row) {
            $csv_file[] = array_combine($header, $row);
        }

        $renderer = new PhpRenderer( __DIR__ . '/templates/');
        return $renderer->render($response, "questionsListView.php", ['csv_file' => $csv_file]);
    } 
    // Neither files exists
    else {
        $alert_message = 'No data was read.';
    }
});

// Get Method for Adding Questions
$app->get('/addQuestions', function (Request $request, Response $response, array $args) {
    
    $renderer = new PhpRenderer( __DIR__ . '/templates/');
    return $renderer->render($response, "questionsAddView.php");
});

// Post Method for Questions
$app->post('/addQuestions', function (Request $request, Response $response, array $args): Response {
    // Checks
    $json_file_check = __DIR__ . '/../data/questions.json';
    $csv_file_check = __DIR__ . '/../data/questions.csv';
    
    // Process
    // Check if JSON exists, and we add the posted values
    if(file_exists($json_file_check)) {
        $get_json = file_get_contents( __DIR__ . '/../data/questions.json');
        $json_file = json_decode($get_json, true);
        
        $json_file = array_values($json_file);

        $json_added_values = [];
        if (!empty($_POST['question'])) { $json_added_values['text'] = $_POST['question']; }
        if (!empty($_POST['dateadded'])) { $json_added_values['createdAt'] = $_POST['dateadded']; }
        if (!empty($_POST['choice_one'])) { $json_added_values['choices'][0]['text'] = $_POST['choice_one']; }
        if (!empty($_POST['choice_two'])) { $json_added_values['choices'][1]['text'] = $_POST['choice_two']; }
        if (!empty($_POST['choice_three'])) { $json_added_values['choices'][2]['text'] = $_POST['choice_three']; }

        array_push($json_file, $json_added_values);
        file_put_contents($json_file_check, json_encode($json_file));

    } 
    // Check if CSV exists and we add the posted values
    if (file_exists($csv_file_check)) {
        $csv_posted_data = $request->getParsedBody();
        $csv_posted_data = array_values($csv_posted_data);
        $handle = fopen($csv_file_check, "a");
        fputcsv($handle, $csv_posted_data);
        fclose($handle);
    }

    $renderer = new PhpRenderer( __DIR__ . '/templates/');
    return $renderer->render($response, "questionsAddedSucessView.php");


});


$app->run();
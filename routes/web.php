<?php

use App\Core\Router\Routes;

Routes::get("/php-expert/Mini%20Projects/Test%20Micro%20Framework/", "HomeController@index");
Routes::get("/php-expert/Mini%20Projects/Test%20Micro%20Framework/contact/delete/{id}" , "ContactController@delete");
Routes::post("/php-expert/Mini%20Projects/Test%20Micro%20Framework/contact/add"  , "ContactController@add");
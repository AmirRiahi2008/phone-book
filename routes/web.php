<?php

use App\Core\Router\Routes;
use App\Middlewares\BlockEdge;

Routes::get("/php-expert/Mini%20Projects/Test%20Micro%20Framework/", "HomeController@index", [BlockEdge::class]);
Routes::get("/php-expert/Mini%20Projects/Test%20Micro%20Framework/contact/delete/{id}", "ContactController@delete");
Routes::post("/php-expert/Mini%20Projects/Test%20Micro%20Framework/contact/add", "ContactController@add");

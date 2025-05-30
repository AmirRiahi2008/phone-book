<?php
namespace App\Controllers;
use Faker\Factory;
use Medoo\Medoo;

use App\Core\Request;
use App\Models\Contact;
use App\Models\User;
class HomeController
{
    private $request;
    private $contactModel;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->contactModel = new Contact();
    }
    public function index()
    {

        $where = ["ORDER" => ["created_at" => "DESC"]];
        if ($this->request->getParam("search") !== null) {
            $where["AND"] = [
                "OR" => [
                    "name[~]" => $this->request->getParam("search"),
                    "mobile[~]" => $this->request->getParam("search"),
                    "email[~]" => $this->request->getParam("search"),
                ]
            ];
        }

        $contacts = $this->contactModel->get($where);

        $data = [
            "lastPage" => $this->contactModel->lastPage,
            "curPage" => $this->contactModel->curPage,
            "contacts" => $contacts
        ];
        view("home.index-page", $data);

    }

}
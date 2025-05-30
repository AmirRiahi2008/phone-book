<?php
namespace App\Controllers;

use App\Core\Request;
use App\Models\Contact;
class ContactController
{
    private $request;
    private $contactModel;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->contactModel = new Contact();
    }
    public function add()
    {
        $data["errors"] = [];
        $name = $this->request->getParam("name");
        $email = $this->request->getParam("email");
        $mobile = $this->request->getParam("mobile");
        if (empty($name) || $name === null) {
            $data["errors"][] = "Please Input Name Conrrectly ⚠️";
        }

        if (empty($mobile) || $mobile === null) {
            $data["errors"][] = "Please Input Mobile Conrrectly ⚠️";
        }
        if (empty($email) || $email === null) {
            $data["errors"][] = "Please Input Email Conrrectly ⚠️";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data["errors"][] = "Your Email Is Incorrect Format Please Fix it ⚠️";
        }
        if (!empty($data["errors"])) {
            view("contact.add-page", $data);
            die();
        }
        if ($this->contactModel->count(["mobile" => $mobile])) {
            $data["errors"][] = "This Phone Number is Already Exists Please Try Another one ⚠️";
            view("contact.add-page", $data);
            die();
        }

        $data["contactId"] = $this->contactModel->create([
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile
        ]);

        view("contact.add-page", $data);

    }
    public function delete()
    {
        $contactId = $this->request->getAttr("id") ?? null;
        if ($contactId === null)
            return "Invalid Contact ID";
        $result = $this->contactModel->delete(["id" => $contactId]);
        $data = [
            "deletedCount" => $result
        ];
        view("contact.delete-page", $data);
    }
}
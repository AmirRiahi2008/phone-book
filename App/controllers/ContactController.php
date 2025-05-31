<?php
namespace App\Controllers;
// use App\Core\Request;

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
        if (empty($name) || $name === null)
             $data["errors"][]  = "Input Name Is Incorrect";
        if (empty($email) || $email === null)
             $data["errors"][]  = "Input Email Is Incorrect";
        if (empty($mobile) || $mobile === null)
             $data["errors"][]  = "Input Mobile Is Incorrect";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
             $data["errors"][]  = "Input Email Is Not Correct Format";
        if (!empty($data["errors"])) {
            view("contact.add-result", $data);
            die();
        }
        if ($this->contactModel->count(["mobile" => $mobile])) {
             $data["errors"][]  = "There is The Same Phone number in Phone book";
            view("contact.add-result", $data);
            die();
        }

        $data["contactId"] = $this->contactModel->create([
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile
        ]);
        view("contact.add-result", $data);

    }
    public function delete()
    {
        $contactID = $this->request->getAttr("id") ?? null;
        if (!is_numeric($contactID) || $contactID === null)
            return;
        $result = $this->contactModel->delete(["id" => $contactID]);
        $data["deletedCount"] = $result;
        view("contact.delete-result", $data);
    }
}
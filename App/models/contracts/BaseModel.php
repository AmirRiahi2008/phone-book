<?php
namespace App\Models\Contracts;
abstract class BaseModel implements CRUD_interface
{
    protected $pageSize = 10;
    protected $primaryKey = "id";
    protected $attributes = [];
    public $lastPage;
    public $curPage;
    protected $table;

    public function __get($name)
    {
        return $this->attributes[$name];

    }
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;

    }
    public function getAttr($key)
    {
        return $this->attributes[$key];
    }
    public function getAttrs()
    {
        return $this->attributes;
    }
    public function setAttrs($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}
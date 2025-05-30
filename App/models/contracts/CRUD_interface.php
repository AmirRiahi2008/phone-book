<?php
namespace App\Models\Contracts;
interface CRUD_interface
{
    public function create($data): int;
    public function update($newData, $where): int;
    public function delete($where): int;
    public function get($where): array;

}
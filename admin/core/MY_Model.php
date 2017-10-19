<?php

abstract class MY_Model extends CI_Model
{
    abstract public function get($primaryKey);

    abstract public function getMany(array $data);

    abstract public function create(array $data);

    abstract public function update(array $data, $primaryKey);

    abstract public function delete($primaryKey);
}

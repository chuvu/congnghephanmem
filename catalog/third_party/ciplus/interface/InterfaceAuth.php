<?php

interface InterfaceAuth
{
    public function get($userId);

    public function getByEmail($email);

    public function attempt($username, $password);

    public function id();

    public function create(array $data);
}

<?php
namespace App;
class Path {
    public $CurrentPath= array();

    public function __construct()
    {
        $this->add("Home", "/", false);

    }
    public function getAll()
    {
        return $this->CurrentPath;
    }
    public function add($name, $url, $active=false)
    {
        array_push($this->CurrentPath, (object) [
            "name" => $name,
            "url" => $url,
            "active" => $active
          ]
        );
    }

}
<?php


interface IBaseCrmObj
{
    static function getAll();
    public function create();
    public function update();
    public function select();
    public function delete();



}

?>

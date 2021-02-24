<?php


namespace App\Models;

use MongoDB\Client;
use MongoDB\BSON\ObjectId;

class User
{
    private $users;

    public function __construct()
    {
        $m = new Client();
        $db = $m->mongo_db;
        $this->users = $db->users;
    }

    public function getUsers() {
        return $this->users->find();
    }

    public function storeUser($user) {
        try {
            $this->users->insertOne($user);
            return 'User successfully created';
        }catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getUserById($id) {
        return $this->users->findOne(['_id' => new ObjectId($id)]);
    }

    public function updateUser($id, $user) {
        try {
            $this->users->findOneAndReplace(['_id' => new ObjectId($id)], $user);
            return "User successfully updated";
        }catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deleteUser($id) {
        try {
            $this->users->deleteOne([ "_id" => new ObjectId($id) ]);
            return "The user successfully has been deleted";
        }catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
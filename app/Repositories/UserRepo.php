<?php namespace Bubbles\Repositories;


use Bubbles\User;

class UserRepo {

    /**
     * Find a user by Last Name
     *
     * ToDo: return an array for people with same last name
     *
     * @param $name
     * @return mixed
     */
    public function findByLastName($name)
    {
        return User::where('last_name', '=', $name)->firstOrFail();
    }
}
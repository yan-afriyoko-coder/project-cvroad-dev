<?php

namespace App\Repositories\Interfaces;

interface IExperienceRepo
{
    function create($request);
    function delete($request, $id);
    function userEperience($user_id);
    function update($request, $id);
}

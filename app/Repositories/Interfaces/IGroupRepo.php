<?php

namespace App\Repositories\Interfaces;

interface IGroupRepo
{
    function all();
    function create($request);
    function find($id);
    function update($request, $id);
    function addDealer($group_id, $dealer_id);
    function removeDealer($dealer_id);

}

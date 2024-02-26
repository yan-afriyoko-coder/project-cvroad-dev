<?php

namespace App\Repositories\Interfaces;

interface IJobRepo
{
    function all($request);
    function latest();
    function myJobs();
    function update($request, $id);
    function store($request);
    function apply($request, $id);
    function applicants($id);
    function find($id);
    function end($id);

    function dealerJobs($id);
}

<?php

namespace App\Repositories\Interfaces;

interface IDealershipRepo
{
    function register($request);
    function random();
    function all();
    function myDealer();
    function update($request);
    function uploadCoverPhoto($request);
    function uploadLogo($request);
    function topDealers();
    function find($id);
    function countActive();
    function countApplications();
    function countSuspended();
    function getActive();
    function getSuspended();
    function getPending();
    function approve($id);
    function reject($id);
    function suspend($id);
    function search($search);
}

<?php

namespace App\Repositories\Interfaces;

interface ICandidateRepo
{
    function candidates($request);
    function recent();    
    function approved();
    function suspended();
    function pending();
    function find($id);
    function countActive();
    function countSuspended();
    function countRejeted();
    function countPending();
    function approve($id);
    function suspend($id);
    function reject($id);
}

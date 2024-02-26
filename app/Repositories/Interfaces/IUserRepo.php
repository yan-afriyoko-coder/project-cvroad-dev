<?php

namespace App\Repositories\Interfaces;

interface IUserRepo
{
    function updateAvatar($request);
    function updateProfile($request);
    function uploadCoverLetter($request);
    function uploadCV($request);
    function uploadCertificates($request);
    function uploadPaySlip($request);
    function uploadOtherDocs($request);
    function drivers();
    function languages();
    function find($id);
}

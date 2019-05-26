<?php

namespace App\Repositories\Contracts;

interface VervoerRepositoryBackend
{
    public function getVervoerContent();
    
    public function updateVervoerContent(array $vervoerContent);
}
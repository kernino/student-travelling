<?php

namespace App\Repositories\Contracts;

interface VervoerRepositoryBackend
{
    public function getVervoerContent();
    
    public function createVervoerContent(string $vervoerContent);
    public function updateVervoerContent(array $vervoerContent);
}
<?php

namespace App\Repositories\Contracts;

interface AutoRepositoryBackend
{
    public function getAutoContent();
    
    public function createAutoContent(string $autoContent);
    public function updateAutoContent(array $autoContent);
}
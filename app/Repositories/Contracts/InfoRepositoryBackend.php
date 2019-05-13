<?php

namespace App\Repositories\Contracts;

interface InfoRepositoryBackend
{
    public function getInfo();    
    public function saveInfo(array $infoContent);
}


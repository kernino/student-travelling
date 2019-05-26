<?php

namespace App\Repositories\Contracts;

interface InfoRepositoryBackend
{
    public function getAlgemeneInfo();
    public function saveInfo(array $infoContent);
}


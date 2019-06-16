<?php

namespace App\Repositories\Contracts;

interface InfoRepositoryBackend
{
    public function getAlgemeneInfo();
    public function updateAlgemeneInfo(array $infoContent);
}


<?php

namespace App\Repositories\Contracts;

interface InfoRepositoryBackend
{
    public function getAlgemeneInfo($sContent);
    public function saveInfo(array $infoContent);
}


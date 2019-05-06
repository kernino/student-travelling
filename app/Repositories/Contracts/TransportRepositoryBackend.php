<?php

namespace App\Repositories\Contracts;

interface TransportRepositoryBackend
{
    public function getTransportContent();
    
    public function saveTransportContent(string $TransportContent);
}
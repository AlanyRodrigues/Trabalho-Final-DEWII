<?php

namespace Config;

use CodeIgniter\Config\BaseService;

class Services extends BaseService
{

    public static function estado($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('estado');
        }

        return new \App\Services\EstadoService();
    }

    public static function municipio($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('municipio');
        }

        return new \App\Services\MunicipioService();
    }
}
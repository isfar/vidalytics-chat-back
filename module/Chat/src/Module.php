<?php
/**
 * @author Isfar Sifat <isfar.sifat@gmail.com>
 */

namespace Chat;

class Module
{
    const VERSION = '1.0-beta';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}

<?php declare(strict_types=1);

namespace app\service;

/**
 * Sample service interface to demonstrate service injections.
 */
interface HelloInterface {
    function say(string $name = null): string;
}

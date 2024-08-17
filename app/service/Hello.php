<?php declare(strict_types=1);

namespace app\service;

/**
 * Sample service to demonstrate service injections
 */
class Hello implements HelloInterface {
    var string $name;

    function __construct(string $name = '?') {
        $this->name = $name;
    }

    function say(string $name = null): string {
        return format('Hello, %s!', htmlspecialchars(
            $name ?? $this->name
        ));
    }
}

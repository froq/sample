<?php declare(strict_types=1);

namespace app\service;

/**
 * Sample service to demonstrate service injections.
 */
class Hello implements HelloInterface {
    private string $name;

    public function __construct(string $name = '?') {
        $this->name = $name;
    }

    public function say(string $name = null): string {
        return format('Hello, %s!', htmlspecialchars(
            $name ?? $this->name
        ));
    }
}

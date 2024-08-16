<?php declare(strict_types=1);
namespace app\library;

use froq\datetime\UtcDateTime;

/**
 * Util class as UTC date/time data.
 */
class Date extends UtcDateTime {
    /**
     * @override
     */
    function __toString(): string {
        return $this->format('c');
    }
}

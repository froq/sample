<?php declare(strict_types=1);
namespace test\unit;

use froq\datetime\{UtcDateTime, UtcDateTimeZone};
use app\library\Date;

class DateTest extends \UnitTestCase
{
    function test_instance_check() {
        $date = new Date();

        self::assertInstanceOf(UtcDateTime::class, $date);
        self::assertInstanceOf(UtcDateTimeZone::class, $date->getTimezone());
    }

    function test_string_cast() {
        $date = new Date();

        self::assertSame($date->format('c'), (string) $date);
    }

    function test_timezone_utc() {
        $date = new Date();

        self::assertSame('UTC', (string) $date->getTimezone());
    }
}

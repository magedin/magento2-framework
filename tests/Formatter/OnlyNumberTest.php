<?php

declare(strict_types=1);

namespace Formatter;

use MagedIn\Framework\Magento2\Formatter\OnlyNumber;
use PHPUnit\Framework\TestCase;

class OnlyNumberTest extends TestCase
{
    /**
     * @test
     */
    public function format()
    {
        $formatter = new OnlyNumber();
        $this->assertEquals('00000', $formatter->format('00000'));
        $this->assertEquals('0123', $formatter->format('0xyz1e2r3'));
        $this->assertEmpty($formatter->format('xyz'));
    }
}

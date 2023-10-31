<?php

declare(strict_types=1);

namespace Formatter;

use MagedIn\Framework\Magento2\Formatter\StringSize;
use PHPUnit\Framework\TestCase;

class StringSizeTest extends TestCase
{
    /**
     * @test
     */
    public function format()
    {
        $formatter = new StringSize();
        $this->assertEquals('098765', $formatter->format('98765', 6, '0', STR_PAD_LEFT));
        $this->assertEquals('00098765', $formatter->format('98765', 8, '0', STR_PAD_LEFT));
        $this->assertEquals('11198765', $formatter->format('98765', 8, '1', STR_PAD_LEFT));
        $this->assertNotEquals('00098765', $formatter->format('098765', 8, '1', STR_PAD_LEFT));
    }
}

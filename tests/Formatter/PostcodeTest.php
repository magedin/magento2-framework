<?php

declare(strict_types=1);

namespace Formatter;

use MagedIn\Framework\Magento2\Formatter\OnlyNumber;
use MagedIn\Framework\Magento2\Formatter\Postcode;
use MagedIn\Framework\Magento2\Formatter\StringSize;
use MagedIn\Framework\Magento2\Normalizer\Postcode as Normalizer;
use PHPUnit\Framework\TestCase;

class PostcodeTest extends TestCase
{
    protected OnlyNumber $onlyNumbers;
    protected StringSize $stringSize;
    protected Normalizer $normalizer;

    protected function setUp(): void
    {
        $this->onlyNumbers = new OnlyNumber();
        $this->stringSize = new StringSize();
        $this->normalizer = new Normalizer($this->onlyNumbers, $this->stringSize);
    }

    /**
     * @test
     */
    public function format()
    {
        $formatter = new Postcode($this->normalizer);
        $this->assertEquals('06321-000', $formatter->format('06321-000'));
        $this->assertEquals('06321-000', $formatter->format('06321000'));
        $this->assertEquals('06321-000', $formatter->format('6321000'));
    }
}

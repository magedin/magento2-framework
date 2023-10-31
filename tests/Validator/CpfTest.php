<?php

declare(strict_types=1);

namespace Validator;

use MagedIn\Framework\Magento2\Formatter\OnlyNumber;
use MagedIn\Framework\Magento2\Formatter\StringSize;
use MagedIn\Framework\Magento2\Normalizer\Cpf as CpfNormalizer;
use MagedIn\Framework\Magento2\Validator\Cpf as CpfValidator;
use PHPUnit\Framework\TestCase;

/**
 * @see https://www.devmedia.com.br/teste-unitario-com-phpunit/41231
 */
class CpfTest extends TestCase
{
    protected OnlyNumber $onlyNumbers;
    protected StringSize $stringSize;
    protected CpfNormalizer $normalizer;
    protected CpfValidator $validator;

    protected function setUp(): void
    {
        $this->onlyNumbers = new OnlyNumber();
        $this->stringSize = new StringSize();
        $this->normalizer = new CpfNormalizer($this->onlyNumbers, $this->stringSize);
        $this->validator = new CpfValidator($this->normalizer);
    }

    /**
     * @test
     */
    public function isValid()
    {
        $this->assertTrue($this->validator->validate('123.456.789-0'), 'CPF is not valid.');
        $this->assertTrue($this->validator->validate('1234567890'), 'CPF is not valid.');
        $this->assertTrue($this->validator->validate('xx1234567890'), 'CPF is not valid.');
    }

    /**
     * @test
     */
    public function isNotValid()
    {
        $this->assertFalse($this->validator->validate('123.456.789-1'), 'CPF is valid.');
        $this->assertFalse($this->validator->validate('1234567891'), 'CPF is valid.');
        $this->assertFalse($this->validator->validate('xx1234567891'), 'CPF is valid.');
        $this->assertFalse($this->validator->validate('00xx1234567891'), 'CPF is valid.');
    }
}

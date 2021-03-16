<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2021 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Validator;

class Cnpj
{
    /**
     * @var int
     */
    const MAX_LENGTH = 14;

    /**
     * @var \MagedIn\Normalizer\Cnpj
     */
    private $normalizer;

    public function __construct(
        \MagedIn\Normalizer\Cnpj $normalizer
    ) {
        $this->normalizer = $normalizer;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function validate(string $value): bool
    {
        $value = $this->normalizer->normalize($value);
        if (!$this->baseValidation($value) || !$this->validateAlgorithm($value)) {
            return false;
        }
        return true;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function baseValidation(string $value): bool
    {
        /**
         * CNPJ number cannot have more than 14 numbers.
         */
        if (strlen($value) > self::MAX_LENGTH) {
            return false;
        }

        /**
         * Check if the numbers are repeated. E.g.: 99.999.999/9999-99
         */
        if (preg_match('/(\d)\1{13}/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function validateAlgorithm(string $value): bool
    {
        /**
         * Validate the first verifier digit.
         */
        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $value[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        if ($value[12] != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

        /**
         * Validate the second verifier digit.
         */
        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $value[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        return $value[13] == ($rest < 2 ? 0 : 11 - $rest);
    }
}
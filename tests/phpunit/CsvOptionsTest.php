<?php

declare(strict_types=1);

namespace Keboola\CsvOptions\Tests;

use InvalidArgumentException;
use Keboola\CsvOptions\CsvOptions;
use PHPUnit\Framework\TestCase;

class CsvOptionsTest extends TestCase
{
    public function testAccessors(): void
    {
        $csvFile = new CsvOptions();
        $this->assertEquals('"', $csvFile->getEnclosure());
        $this->assertEquals('', $csvFile->getEscapedBy());
        $this->assertEquals(',', $csvFile->getDelimiter());
    }

    public function testInvalidDelimiter(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Delimiter must be a single character. ",," received');
        new CsvOptions(',,');
    }

    public function testInvalidDelimiterEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Delimiter cannot be empty.');
        new CsvOptions('');
    }

    public function testInvalidEnclosure(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Enclosure must be a single character. ",," received');
        new CsvOptions(CsvOptions::DEFAULT_DELIMITER, ',,');
    }
}

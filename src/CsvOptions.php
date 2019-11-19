<?php

declare(strict_types=1);

namespace Keboola\CsvOptions;

class CsvOptions
{
    public const DEFAULT_DELIMITER = ',';
    public const DEFAULT_ENCLOSURE = '"';
    public const DEFAULT_ESCAPED_BY = '';

    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var string
     */
    private $enclosure;

    /**
     * @var string
     */
    private $escapedBy;

    public function __construct(
        string $delimiter = self::DEFAULT_DELIMITER,
        string $enclosure = self::DEFAULT_ENCLOSURE,
        string $escapedBy = self::DEFAULT_ESCAPED_BY
    ) {
        $this->escapedBy = $escapedBy;
        $this->validateDelimiter($delimiter);
        $this->delimiter = $delimiter;
        $this->validateEnclosure($enclosure);
        $this->enclosure = $enclosure;
    }

    protected function validateDelimiter(string $delimiter): void
    {
        if (strlen($delimiter) > 1) {
            throw new InvalidArgumentException(sprintf(
                'Delimiter must be a single character. %s received',
                json_encode($delimiter)
            ));
        }

        if ($delimiter === '') {
            throw new InvalidArgumentException(
                'Delimiter cannot be empty.'
            );
        }
    }

    protected function validateEnclosure(string $enclosure): void
    {
        if (strlen($enclosure) > 1) {
            throw new InvalidArgumentException(sprintf(
                'Enclosure must be a single character. %s received',
                json_encode($enclosure)
            ));
        }
    }

    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    public function getEnclosure(): string
    {
        return $this->enclosure;
    }

    public function getEscapedBy(): string
    {
        return $this->escapedBy;
    }
}

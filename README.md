# CSV Options

[![Build Status](https://travis-ci.com/keboola/php-csv-options.svg?branch=master)](https://travis-ci.com/keboola/php-csv-options)

Options for csv files

# Usage

```
new CsvOptions(
    string $delimiter = CsvOptions::DEFAULT_DELIMITER,
    string $enclosure = CsvOptions::DEFAULT_ENCLOSURE,
    string $escapedBy = CsvOptions::DEFAULT_ESCAPED_BY
);
```

## Development
 
Clone this repository and init the workspace with following command:

```
git clone https://github.com/keboola/php-csv-options
cd php-csv-options
docker-compose build
docker-compose run --rm dev composer install --no-scripts
```

Run the test suite using this command:

```
docker-compose run --rm dev composer tests
``` 

# Cryptowatch HTTP API client
A rough implementation of the Cryptowatch HTTP API

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)

# Installation
This package can be installed using composer
```php
composer require djansen20/cryptowatch-http-api dev-master
```

## Usage
In order to use this library, includ the following namespace into you project

```php
use Cryptowatch\CryptowatchHttpApi
```

All methods will return a response object that can be convertd to json or to a usable array
```php
# To get data as array
$array = $response->asArray();

# Get data as json
$json = $response->jsonSerialize();
```

### Rate limiting
Cryptowatch gives each client 8 seconds of CPU time per hour. Currently this client does not read this limit or does anything with it.
If you get a response with status code 429 it means the request limit has been reached. The library will probably crap out earlier though.

### Methods
All methods are called statically so there is no need to create an object. Currently there are 5 possible static methods.

### getAssets
An asset can be a crypto or fiat currency

Example request
```php
$asset = 'neo';
$responseObject = CryptowatchHttpApi::getAssets($asset);
$data = $responseObject->asArray();
```

Example response
```php
array(2) {
  ["result"]=>
  array(5) {
    ["id"]=>
    int(66)
    ["symbol"]=>
    string(3) "neo"
    ["name"]=>
    string(3) "NEO"
    ["fiat"]=>
    bool(false)
    ["markets"]=>
    array(1) {
      ["base"]=>
      array(11) {
        [0]=>
        array(5) {
          ["id"]=>
          int(643)
          ["exchange"]=>
          string(6) "bitmex"
          ["pair"]=>
          string(22) "neobtc-monthly-futures"
          ["active"]=>
          bool(true)
          ["route"]=>
          string(62) "https://api.cryptowat.ch/markets/bitmex/neobtc-monthly-futures"
        }
        [1]=>
        array(5) {
          ["id"]=>
          int(661)
          ["exchange"]=>
          string(6) "bitmex"
          ["pair"]=>
          string(24) "neobtc-quarterly-futures"
          ["active"]=>
          bool(true)
          ["route"]=>
          string(64) "https://api.cryptowat.ch/markets/bitmex/neobtc-quarterly-futures"
        }
        ...
      }
    }
  }
  ["allowance"]=>
  array(2) {
    ["cost"]=>
    int(113410)
    ["remaining"]=>
    int(7947157629)
  }
}
```

### getPairs
A pair of assets. Each pair has a base and a quote. For example, btceur has base btc and quote eur.

Example Request
```php
$pair = 'neotbtc'
$responseObject = CryptowatchHttpApi::getPairs($pair);
$data = $responseObject->asArray();
```

Example Response
```php
array(2) {
  ["result"]=>
  array(6) {
    ["symbol"]=>
    string(6) "neobtc"
    ["id"]=>
    int(86)
    ["base"]=>
    array(5) {
      ["id"]=>
      int(66)
      ["symbol"]=>
      string(3) "neo"
      ["name"]=>
      string(3) "NEO"
      ["fiat"]=>
      bool(false)
      ["route"]=>
      string(35) "https://api.cryptowat.ch/assets/neo"
    }
    ["quote"]=>
    array(5) {
      ["id"]=>
      int(60)
      ["symbol"]=>
      string(3) "btc"
      ["name"]=>
      string(7) "Bitcoin"
      ["fiat"]=>
      bool(false)
      ["route"]=>
      string(35) "https://api.cryptowat.ch/assets/btc"
    }
    ["route"]=>
    string(37) "https://api.cryptowat.ch/pairs/neobtc"
    ["markets"]=>
    array(3) {
      [0]=>
      array(5) {
        ["id"]=>
        int(582)
        ["exchange"]=>
        string(7) "binance"
        ["pair"]=>
        string(6) "neobtc"
        ["active"]=>
        bool(true)
        ["route"]=>
        string(47) "https://api.cryptowat.ch/markets/binance/neobtc"
      }
      [1]=>
      array(5) {
        ["id"]=>
        int(34)
        ["exchange"]=>
        string(8) "bitfinex"
        ["pair"]=>
        string(6) "neobtc"
        ["active"]=>
        bool(true)
        ["route"]=>
        string(48) "https://api.cryptowat.ch/markets/bitfinex/neobtc"
      }
      [2]=>
      array(5) {
        ["id"]=>
        int(383)
        ["exchange"]=>
        string(7) "bittrex"
        ["pair"]=>
        string(6) "neobtc"
        ["active"]=>
        bool(true)
        ["route"]=>
        string(47) "https://api.cryptowat.ch/markets/bittrex/neobtc"
      }
    }
  }
  ["allowance"]=>
  array(2) {
    ["cost"]=>
    int(224791)
    ["remaining"]=>
    int(7946932838)
  }
}
```

### getExchanges
Get information on a specific exchange

Example Request
```php
$exchange = 'bitstamp';
$responseObject = CryptowatchHttpApi::getExchanges($exchange);
$data = $responseObject->asArray();
```

Example Response
```php
array(2) {
  ["result"]=>
  array(5) {
    ["id"]=>
    int(3)
    ["symbol"]=>
    string(8) "bitstamp"
    ["name"]=>
    string(8) "Bitstamp"
    ["active"]=>
    bool(true)
    ["routes"]=>
    array(1) {
      ["markets"]=>
      string(41) "https://api.cryptowat.ch/markets/bitstamp"
    }
  }
  ["allowance"]=>
  array(2) {
    ["cost"]=>
    int(29870)
    ["remaining"]=>
    int(7946902968)
  }
}
```

### getMarkets
A market is a pair listed on an exchange. For example, pair btceur on exchange kraken is a market.

There are various subcommands available for each exchange / pair combo.
- price // Returns a market’s last price.
- summary // Returns a market’s last price as well as other stats based on a 24-hour sliding window.
- trades // Returns a market’s most recent trades, incrementing chronologically.
- orderbook // Returns a market’s order book.
- ohlc // Returns a market’s OHLC candlestick data. Returns data as lists of lists of numbers for each time period integer.

Example Request
```php
$exchange = 'bitstamp';
$pair = 'btcusd';
$subcommand = 'ohlc';

$params = [
    'after' => 1481563244
    'before' => 1481663244
    'periods' => 86400
];

$responseObject = CryptowatchHttpApi::getMarkets($exchange, $pair, $subcommand, $params);
$data = $responseObject->asArray();
```

Example Response
```php
array(2) {
  ["result"]=>
  array(1) {
    [86400]=>
    array(2) {
      [0]=>
      array(7) {
        [0]=>
        int(1481587200)
        [1]=>
        float(768.97)
        [2]=>
        int(779)
        [3]=>
        float(768.96)
        [4]=>
        float(776.9)
        [5]=>
        float(2802.0916)
        [6]=>
        int(0)
      }
      [1]=>
      array(7) {
        [0]=>
        int(1481673600)
        [1]=>
        int(777)
        [2]=>
        float(793.27)
        [3]=>
        float(765.1)
        [4]=>
        float(775.35)
        [5]=>
        float(4918.8164)
        [6]=>
        int(0)
      }
    }
  }
  ["allowance"]=>
  array(2) {
    ["cost"]=>
    int(2032490)
    ["remaining"]=>
    int(7943769676)
  }
}
```

### getAggregate
Markets are identified by a slug, which is the exchange name and currency pair concatenated with a colon.

There are currently 2 aggregates available
- prices // Returns the current price for all supported markets. Some values may be out of date by a few seconds.
- summaries // Returns the market summary for all supported markets. Some values may be out of date by a few seconds.


Example Request
```php
$method = 'prices';
$responseObject = CryptowatchHttpApi::getAggregate($method);
$data = $responseObject->asArray();
```

Example Response
```php
array(2) {
  ["result"]=>
  array(726) {
    ["binance:adabtc"]=>
    float(2.165E-5)
    ["binance:adaeth"]=>
    float(0.00033469)
    ["binance:arkbtc"]=>
    float(0.0003211)
    ["binance:batbtc"]=>
    float(2.413E-5)
    ["binance:bateth"]=>
    float(0.00037179)
    ["binance:bccbtc"]=>
    float(0.115777)
    ["binance:bcceth"]=>
    float(1.79409)
    ["binance:bccusdt"]=>
    float(989.7)
  ...
  }
  ["allowance"]=>
  array(2) {
    ["cost"]=>
    int(1039078)
    ["remaining"]=>
    int(7941514860)
  }
}

```
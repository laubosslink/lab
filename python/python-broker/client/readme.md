# Client

## Configuration

Just copy config/client.sample.json into config/client.json.

Just check directive, you'll surely need to specify data_directory, and server host.

## Utilisation

```
<?php

include('lib/setup.php');

// To know how use, it depends of library used. See doc/third/*
```

## Dependencies

If config is YAML
```
apt-get install php-pear
apt-get install php5-dev
yes | pecl install yaml
```

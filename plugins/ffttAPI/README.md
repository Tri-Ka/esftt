FFTTApi, API PHP pour la FFTT
=============================

[![build status](https://gitlab.com/al37350/ffttAPI/badges/master/build.svg)](https://gitlab.com/al37350/ffttAPI/commits/master)
[![coverage report](https://gitlab.com/al37350/ffttAPI/badges/master/coverage.svg)](https://gitlab.com/al37350/ffttAPI/commits/master)
FFTTApi permet de consommer facilement l'API officielle de la Fédération Française de Tennis de table.

### Installation avec Composer


Il est recommandé d'installer FFTTApi grâce à composer
[Composer](http://getcomposer.org).

```bash
# Installer Composer
curl -sS https://getcomposer.org/installer | php
```

Puis, lancez la commande composer pour installer la dernière version stable de FFTTApi :


```bash
php composer.phar require al37350/fftt-api
```

Après l'installation, vous devez requérir l'autoloader de composer :
```php
require 'vendor/autoload.php';
```

Ainsi vous pouvez facilement mettre à jour le packet.

```bash
composer.phar update
```
### Exemple d'utilisation

```php
<?php

use FFTTApi\FFTTApi;

require __DIR__ . '/vendor/autoload.php';

$api = new FFTTApi("identifiant", "password");
$joueurs = $api->getJoueursByNom("Lamirault");

```

### Tests

Vous pouvez lancer les tests unitaires avec la commande suivante:
```bash
$ cd path/to/FFTTApi/
$ composer.phar install
$ phpunit
```
# geldvoorelkaar2
Geldvoorelkaar gebaseerd op Laravel Lumen Framework

## Requirements:
- Git
- Composer
- Php
- MySQL database

## Installatie
Ik raad je aan om de Laravel documentatie te lezen voor meer informatie.

### Git code downloaden

Je kan het project downloaden met het commando
```sh
$ git clone https://github.com/iceburg1991/geldvoorelkaar2.git
```

Wanneer je het project gedownload hebt kan je Laravel installeren met
```sh
$ composer install
```

Als laatste heb je een lege database nodig zoals uitgelegd in de installatie uitleg van Laravel http://laravel.com/docs/5.1/installation. Omdat Laravel out of the box al een User model ingebouwd heeft heb je database tabellen nodig zodat Geldvoorelkaar deze kan gebruiken. Om de database te vullen:
```sh
$ php artisan migrate
```

Open je url en je zou iets moeten zien.

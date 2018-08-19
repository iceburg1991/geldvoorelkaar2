# geldvoorelkaar2
Geldvoorelkaar gebaseerd op het Laravel Framework

## Requirements:
- Git
- Composer
- Php
- MySQL database

## Installatie
Ik raad je aan om de Laravel documentatie te lezen voor meer informatie zoals het opzetten van een lege MySQL database en de applicatie middels de config te koppelen.

### Git code downloaden

Je kan het project downloaden met het commando
```sh
$ git clone https://github.com/iceburg1991/geldvoorelkaar2.git
```

Wanneer je het project gedownload hebt kan je Laravel en alle benodigde packages installeren met
```sh
$ composer install
```

Je hebt een lege database nodig zoals uitgelegd in de installatie uitleg van Laravel http://laravel.com/docs/5.1/installation. Om de database te vullen:
```sh
$ php artisan migrate
```
### Currency
Het systeem maakt gebruik van de casinelli currency package voor de correcte weergave van valuta's. Om de database waarden te updaten:
```sh
php artisan currency:update
```

Open je url en je zou iets moeten zien.

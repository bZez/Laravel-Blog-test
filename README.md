<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Ce que j'ai fait

- Code strictement standadisé via PHP CS Fixer
- Le style est dérivé de celui de Symfony, donc largement de la ``PSR-12``
- Utilisation de ``laravel/breeze`` pour la partie authentification Back-office
- Authentification via ``middleware`` (à épurer)
- Utilisaiton de ``blade`` plutot que Twig (suite utilisation de breeze)
- Utilisation de ``bootstrap 5`` 
- Utilisation du ``(Eloquent) Builder::class`` plutôt qu'un ``Custom QueryBuilder`` vu la simplicité du projet
- Validation via ``Request`` directement, pas de ``StorePostRequest::class`` hormis ``LoginRequest::class``
- Pas de customs casts pour les Models (datetime, type, etc..)
- ``Factories`` et ``Seeder`` fonctionnel
- Tests unitaires fonctionnels (breeze)
- PHP-cs-fixer - OK
- PHPStan - N/R (mais facile un 7)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

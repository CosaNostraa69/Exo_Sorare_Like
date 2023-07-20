# Exercice Symfony API + Nextjs
___

## Installation

Cloner le projet en local

```shell
git@github.com:Magle-corp/exo_last_brief.git
cd exo_last_brief
```

Installer les librairies Nextjs

```shell
cd next
npm install
```

Installer les librairies Symfony

```shell
cd symfony
composer install
```

## Configuration

Configurer Doctrine pour Symfony

```shell
cp symfony/.env.dist symfony/.env # éditer la variable d'environnement DATABASE_URL
```

Créer la base de données et exécuter les fixtures

```shell
php bin/console d:d:c
php bin/console d:m:m
php bin/console d:f:l
```

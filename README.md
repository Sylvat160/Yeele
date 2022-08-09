# Yeele

"Repository" de la plateforme de gestion d'évènement Yeele.

## Clonage

Cloner le projet grace à la commande.

```git
git clone https://github.com/HORINFO-BF/Yeele.git
```

## Installation des différentes dépendances

```bash
# Composer dependances installation
composer install

# Node modules dependances installation
yarn upgrade
#ou
npm install
```

## Après installation

### Renommer le fichier .env.exemple en .env

### Générer une clé pour l'application avec la commande:

```
php artisan key:generate
```
### créer une base de donnée et passer le nom comme valeur à la variable d'environnement DB_DATABASE.

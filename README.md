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
yarn
#ou
npm install
```

## Après installation

<p>Renommer le fichier <strong>.env.exemple</strong> en <strong>.env</strong></p>

### Générer une clé pour l'application avec la commande:

```
php artisan key:generate
```
<p>Créer une base de donnée et passer le nom comme valeur à la variable d'environnement <strong>DB_DATABASE</strong>.</p>

### Migrer les différentes tables et générer les données initiales:

```
php artisan migrate:fresh --seed
```
### Démarrer le serveur de développement:

```
php artisan serve
# http://127.0.0.1:8000
```

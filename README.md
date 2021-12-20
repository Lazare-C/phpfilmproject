# MetaCriticDeux

---

Bonjour,

voici un petit guide sur comment utiliser le site.

# Instalation du serveur

---

- Il faut définir le répertoir `/src` comme répertoir par défaut dans le virtual host
- définir les variables d’environement (ou utiliser le fichier `.env` comme ci-dessous
- importer la db le fichier est `data.sql`
- profiter !

Nous vous avons crée deux compte , un admin, l'autre normal :

> **compte admin :**
>
>
> username : `admin`
> password : `adminadmin`
>

> **compte user :**
>
>
> usernamne : `user`
> password : `useruser`
>

## Example de configuration dans le `.env`

```php
HOST=192.168.78.128
USER=root
DB=phpdb
PSW=php
```

## Liste des fichiers dans le `/src`

```
📦src
 ┣ 📂controllers
 ┃ ┣ 📜actorAdd.php
 ┃ ┣ 📜actorDetail.php
 ┃ ┣ 📜actorEdit.php
 ┃ ┣ 📜actorRemove.php
 ┃ ┣ 📜actors.php
 ┃ ┣ 📜castingAdd.php
 ┃ ┣ 📜filmAdd.php
 ┃ ┣ 📜filmDetail.php
 ┃ ┣ 📜filmEdit.php
 ┃ ┣ 📜filmRemove.php
 ┃ ┣ 📜films.php
 ┃ ┣ 📜home.php
 ┃ ┣ 📜login.php
 ┃ ┣ 📜notFound.php
 ┃ ┗ 📜register.php
 ┣ 📂core
 ┃ ┗ 📜Route.php
 ┣ 📂middleware
 ┃ ┣ 📜admin.php
 ┃ ┗ 📜auth.php
 ┣ 📂models
 ┃ ┣ 📜Actor.php
 ┃ ┣ 📜ActorManager.php
 ┃ ┣ 📜Casting.php
 ┃ ┣ 📜CastingManager.php
 ┃ ┣ 📜DBConnectionManager.php
 ┃ ┣ 📜Film.php
 ┃ ┣ 📜FilmManager.php
 ┃ ┣ 📜User.php
 ┃ ┗ 📜UserManager.php
 ┣ 📂static
 ┃ ┣ 📂actor
 ┃ ┃ ┗ 📜default.png
 ┃ ┣ 📂film
 ┃ ┃ ┗ 📜default.png
 ┃ ┗ 📂home
 ┃ ┃ ┣ 📜shrekwallp.png
 ┃ ┃ ┗ 📜shrekwallp2.png
 ┣ 📂utils
 ┃ ┗ 📜environment.php
 ┣ 📂views
 ┃ ┣ 📂layout
 ┃ ┃ ┗ 📜default.php
 ┃ ┣ 📜actorAdd.php
 ┃ ┣ 📜actorDetail.php
 ┃ ┣ 📜actorEdit.php
 ┃ ┣ 📜actorRemove.php
 ┃ ┣ 📜actors.php
 ┃ ┣ 📜castingAdd.php
 ┃ ┣ 📜filmAdd.php
 ┃ ┣ 📜filmDetail.php
 ┃ ┣ 📜filmEdit.php
 ┃ ┣ 📜filmRemove.php
 ┃ ┣ 📜films.php
 ┃ ┣ 📜home.php
 ┃ ┣ 📜login.php
 ┃ ┣ 📜notFound.php
 ┃ ┗ 📜register.php
 ┣ 📜.env.example
 ┣ 📜.htaccess
 ┗ 📜index.php
```

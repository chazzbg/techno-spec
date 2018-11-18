##Techo farm

requirements
- php >= 7.1.3
- sqlite >= 3
- node 
- npm 
- yarn


steps to run 

- ``git clone https://github.com/chazzbg/techno-spec.git techo``
- ``cp techno/.env.example techno/.env``
- in .env set absolute path to DB file ( eg. /home/farmer/techno/storage/db.sqlite )
- ``composer install``
- ``yarn install``
- ``yarn run dev``
- ``sqlite3 /home/farmer/techno/storage/db.sqlite  '.databases'``
- ``php artisan migrate``
- ``php artisan serve``

visit (http://127.0.0.1:8000)http://127.0.0.1:8000

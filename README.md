# basic_admin

## A projekthez szükséges:
- yarn
- symfony
- composer
- MySQL szerver

## Adatbázis beállítása:
.env fájlon belül a DATABASE_URL környezet változó adja meg az adatbázis információkat, a következőképpen:
#### DATABASE_URL=mysql://user:password@127.0.0.1/dbnev?serverVersion=verzio&charset=utf8

## A beállítás után futtassuk a következő parancsot:
#### php bin/console doctrine:migrations:migrate
Ezzel az adatbázis a megfelelő táblákkal lesz ellátva.

Ezután importáljuk az "IMPORT_USER_DATA.sql" fájlt az adatbázisunkba.

## Futtatás:
1. yarn install
2. composer install
3. yarn encore dev
4. symfony server:start

A weboldal ezek után a http://localhost:8000/ címen lesz elérhető.

## Felhasználók:
| Felhasználónév | Jelszó |
|----------------|--------|
| Admin          | admin  |
| User 1         | user1  |
| User 2         | user2  |
| User 3         | user3  |

# basic_admin

A projekthez szükséges:
- yarn
- symfony
- composer
- MySQL szerver

Adatbázis beállítása:
.env fájlon belül a DATABASE_URL környezet változó adja meg az adatbázis információkat, a következőképpen:
DATABASE_URL=mysql://user:password@127.0.0.1/dbnev?serverVersion=verzio&charset=utf8

Futtatás:
- yarn install
- composer install
- yarn encore dev
- symfony server:start

A weboldal ezek után a http://localhost:8000/ címen lesz elérhető.

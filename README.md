# Password Manager API

Password Manager API je aplikacija za upravljanje lozinkama koja omogucava korisnicima da bezbedno cuvaju i upravljaju svojim lozinkama.

## Postavka

1. Klonirajte repozitorijum: `git clone <URL_do_vašeg_GitHub_repozitorijuma>`
2. Instalirajte zavisnosti: `composer install`
3. Postavite `.env` fajl sa odgovarajucim informacijama o bazi podataka.
4. Pokrenite migracije: `php artisan migrate`
5. Generišite kljuc za aplikaciju: `php artisan key:generate`
6. Pokrenite aplikaciju: `php artisan serve`

## Koriscenje

- **Registracija:** Registrirajte novi nalog koristeci `POST /register` endpoint.
- **Prijava:** Prijavite se koristeci `POST /login` endpoint.
- **Dodavanje naloga:** Dodajte novi nalog koristeci `POST /users/{user}/accounts` endpoint.
- **Prikaz naloga:** Prikaz svih naloga koristeci `GET /accounts` endpoint.
- **Detalji naloga:** Prikaz detalja naloga koristeci `GET /accounts/{account}` endpoint.
- **Azuriranje naloga:** Azurirajte nalog koristeci `PUT /accounts/{account}` endpoint.
- **Brisanje naloga:** Obrisite nalog koristeci `DELETE /accounts/{account}` endpoint.

## Konfiguracija

- Podesite `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, i `DB_PASSWORD` u `.env` fajlu.
- Podesite `APP_KEY` u `.env` fajlu.

## Kontakt

Ako imate pitanja ili primedbe, slobodno nas kontaktirajte na [nlisanin4@gmail.com](mailto:nlisanin4@gmail.com).

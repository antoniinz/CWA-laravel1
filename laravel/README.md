# Správa úkolů – Laravel

Jednoduchá webová aplikace pro správu úkolů vytvořená v Laravelu.

Aplikace umožňuje:

* přidávat nové úkoly
* označovat úkoly jako dokončené
* vracet dokončené úkoly zpět
* mazat úkoly

## Struktura projektu

### `app/`

Obsahuje hlavní PHP část aplikace.

* `Models/Task.php` – model úkolu a jeho nastavení.
* `Http/Controllers/TaskController.php` – zpracovává přidávání, zobrazování, dokončování a mazání úkolů.

### `database/`

Obsahuje databázové soubory.

* `migrations/` – obsahuje migraci, která vytváří tabulku `tasks`.

### `resources/`

Obsahuje soubory pro vzhled aplikace.

* `views/tasks.blade.php` – hlavní stránka aplikace vytvořená pomocí Blade šablony. Obsahuje HTML, CSS a Font Awesome ikony.

### `routes/`

Obsahuje URL adresy aplikace.

* `web.php` – definuje jednotlivé cesty pro zobrazení, přidání, dokončení a smazání úkolů.

### `.env`

Obsahuje nastavení aplikace, například připojení k databázi.

### `artisan`

Příkazový nástroj Laravelu používaný například pro migrace nebo spuštění serveru.

## Spuštění aplikace

Po nastavení databáze spusť migrace:

```bash
php artisan migrate
```

Poté spusť Laravel server:

```bash
php artisan serve
```

Aplikace bude dostupná na adrese:

```text
http://127.0.0.1:8000
```

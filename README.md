# Instrukcja Instalacji APH-CONNECTOR

## Wymagania

- PHP 8.1 lub wyższy
- MySQL 5.7 lub wyższy
- Composer
- Certyfikat SSL (wymagany HTTPS)

## Kroki Instalacji

### 1. Wypakowanie Plików

Wypakuj zawartość pliku ZIP z aplikacją APH-CONNECTOR do wybranego katalogu na serwerze.

### 2. Konfiguracja Pliku Środowiskowego

Znajdź plik `.env` w głównym katalogu aplikacji i edytuj następujące ustawienia:

- **APP_URL**: Ustaw domenę serwera (bez slasha na końcu). **Uwaga:** Wymagany jest SSL, dlatego adres musi zaczynać się od `https`. Przykład: `https://moja-domena-connectora.pl`

- **APP_DEBUG**: Ustaw na `false` dla środowiska produkcyjnego.

### 3. Konfiguracja Połączenia z Bazą Danych

Wypełnij poniższe parametry, dostosowując je do swojej konfiguracji bazy danych:

- **DB_CONNECTION**: `mysql`
- **DB_HOST**: `twoj_host_bazy`
- **DB_PORT**: `port_twojej_bazy` (domyślnie `3306`)
- **DB_DATABASE**: `nazwa_twojej_bazy`
- **DB_USERNAME**: `nazwa_uzytkownika_bazy`
- **DB_PASSWORD**: `"haslo_uzytkownika_bazy"` (należy umieścić w cudzysłowach)

### 4. Instalacja Composera

Wróć do CLI (command line interface) i w głównym katalogu aplikacji zainstaluj Composer, wykonując poniższe polecenia:

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
### 5. Instalacja zależności

Zainstaluj wszystkie niezbędne pakiety, uruchamiając następujące polecenie:

```sh
php composer.phar install
```

### 6. Generowanie klucza aplikacji

Wygeneruj klucz aplikacji za pomocą poniższego polecenia:
```sh
php artisan key:generate
```

### 7. Migracja Bazy Danych

Wykonaj migrację bazy danych, aby utworzyć wszystkie wymagane tabele:
```sh
php artisan migrate
```

### 8. Wypełnienie Bazy Danymi Podstawowymi

Wypełnij bazę danych podstawowymi danymi, wykonując poniższe polecenie:
```sh
php artisan db:seed
```

### 9. Generowanie konta administratora

Wygeneruj konto administratora za pomocą poniższego polecenia. Pamiętaj, aby zapisać dane wyświetlone po wykonaniu komendy
```sh
php artisan create:admin
```
### 10. Zaloguj się do panelu administratora APH-CONNECTOR

Zaloguj się do panelu przez (https://twoja-domena-connectora.pl) **UWAGA! Zostaniesz przekierowany na stronę logowania.**


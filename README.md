# Proxicore – Kundhanteringssystem

Detta projekt är ett enkelt kundhanteringssystem byggt med Laravel och Livewire. Syftet är att visa hur man kan bygga grunden till ett affärssystem med tydlig struktur, moderna Laravel-funktioner och skalbar arkitektur.
Fullständig dokumentation för mer information om projektet: https://docs.google.com/document/d/1Wuz1bD61LSZ6-JSB9xNS-FrXDczsiaSJtOB4v-mUj_M/edit?usp=sharing 

## 🚀 Tekniker

- PHP 8.4.0
- Laravel 12.44.0
- Livewire 2.10.2
- MySQL
- Feature tests and Model Factories

## ⚙️ Installation

1. Klona repot:
https://github.com/Fazilet1820/LaravelUppgift.git

2. Följande versioner används i projektet:
- laravel installer (5.23.2)
- composer (2.8.12)
- node  (v20.10.0)
- npm (10.2.3)

  - composer install
  - npm install

3.Konfigurera miljö:
- cp .env.example .env
- php artisan key:generate

4. Redigera .env-filen och uppdatera databasuppgifterna (projektet använder MySQL):
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=(your database name)
- DB_USERNAME=root
- DB_PASSWORD=(your password)

5. Kör migrationer
- php artisan migrate

6. (Valfritt) Seed databasen med testdata
bashphp artisan db:seed

7. Starta applikationen:
- npm run dev
- php artisan serve
- Applikationen är nu tillgänglig på: http://127.0.0.1:8000

8. | Route                        | Metod | Beskrivning       |

 - | `/customers`                 | GET   | Kundlista         |
 - | `/customers/form`            | GET   | Skapa ny kund     |
 - | `/customers/{customer}/edit` | GET   | Redigera kund     |
 - | `/customers/{customer}`      | GET   | Visa kunddetaljer |
 - | `/dashboard}`                | GET   | Visa homepage     |

9. Funktioner
- Kundhantering :
   -Skapa ny kund och uppdatera kund i samma formulär
   - Visa kunddetaljer
   -ta bort kund
   - Sök funktion med efternamn, e-post eller telefonnummer
- Formulär & Validering
   - Formulärvalidering med Laravel Validation Rules
   - Realtidsvalidering med Livewire
- Interaktiv UI med Livewire-komponenter
- Homepage

10. ## 🧪 Testning
Projektet använder Laravel Feature Tests med Model Factories för att skapa testdata.
- Factories
Projektet innehåller en CustomerFactory som genererar realistisk testdata:
database/factories/CustomerFactory.

### Köra specifika tester:
php artisan test --filter CustomerFormTest



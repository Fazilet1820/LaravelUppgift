# Proxicore – Kundhanteringssystem

Detta projekt är ett enkelt kundhanteringssystem byggt med Laravel och Livewire. Syftet är att visa hur man kan bygga grunden till ett affärssystem med tydlig struktur, moderna Laravel-funktioner och skalbar arkitektur.
Vänligen läs dokumentationen nedan för mer information om projektet: https://docs.google.com/document/d/1Wuz1bD61LSZ6-JSB9xNS-FrXDczsiaSJtOB4v-mUj_M/edit?usp=sharing 

## 🚀 Tekniker

- PHP 8.4.0
- Laravel 12.44.0
- Livewire 2.10.2
- MySQL
- Feature tests

## ⚙️ Installation

1. Klona repot:
https://github.com/Fazilet1820/LaravelUppgift.git

2. Installera beroenden(version som används i projekt):
- laravel installer (5.23.2)
- composer (2.8.12)
- node  (v20.10.0)
- npm (10.2.3)

3.Konfigurera miljö:
- cp .env.example .env
- php artisan key:generate

4. Konfigurera databasen i .env (i prrojektet används MYSQL):
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=(your database name)
- DB_USERNAME=root
- DB_PASSWORD=(your password)

5. Kör migrationer
- php artisan migrate

6. Starta applikationen:
- npm run dev
- php artisan serve

7. | Route                        | Metod | Beskrivning       |

 - | `/customers`                 | GET   | Kundlista         |
 - | `/customers/form`            | GET   | Skapa ny kund     |
 - | `/customers/{customer}/edit` | GET   | Redigera kund     |
 - | `/customers/{customer}`      | GET   | Visa kunddetaljer |
 - | `/dashboard}`                | GET   | Visa homepage     |

8. Funktioner
- Kundhantering :
   -Skapa ny kund och uppdatera kund i samma formulär
   - Visa kunddetaljer
   -ta bort kund
- Formulär & Validering
- Sök funktion med efternamn, e-post eller telefonnummer
- Homepage



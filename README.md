# Content Management System with CodeIgniter 4

A simple Content Management System (CMS) built with CodeIgniter 4 for managing and organizing content efficiently.

## Feature

- Dashboard
- Index page
  
## Requirements

- PHP version 8.1 or newer
- Composer (for dependency management)
- MySQLi (for database interaction)

## Installation

1. Clone or download this repository:
2. Type 'Composer install' in your CLI project location
3. Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Setup
1. Set up your database in App>Config>Database.php
2. Set up your baseUrl in App>Config>App.php
   
## Migration & Seed
Don't forget this project use mysqli for database
1. type $php spark migrate
2. type $php spark db:seed seeddataadmin
3. type $php spark db:seed seeddataanime
   
## Run project
$php spark serve

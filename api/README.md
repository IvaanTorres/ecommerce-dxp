# API - E-Commerce - Digital Experience Platform (DXP)

Link to the project in production: [https://ecommerce-dxp-production.up.railway.app](https://ecommerce-dxp-production.up.railway.app//)

## Features

\-

## Install for development

-   Set up the local database connection config through "/api/.env"
-   Install dependencies

```bash
composer install
```

-   Create the APP_KEY

```bash
php artisan key:generate
```

-   Migrate mock data to the local database

```bash
npm run migrate:db
```

-   Start the development server (Install Artisan CLI in case of error)

```bash
php artisan serve
```

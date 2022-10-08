# E-Commerce - Digital Experience Platform (DXP) - (v1.1.0)

E-Commerce DXP project which aims to create a full experience regarding the brand and the final user.

**Core**:

- **E-Commerce** (products listing, shopping cart, payment...).
- **Admin site (DXP)** to manage the whole brand easily (products, sells, comparatives...).

Link to the project in production: [https://ecommerce-dxp.vercel.app](https://ecommerce-dxp.vercel.app/)

## Features

\-

## Install for development

The project is configured as monorepo (ui/, api/).

### Requirements

- Node (UI): **>= v16**
- PHP (API): **>= v8.1**

### Root (/)

- Set up the local database config through "/.env"
- Install dependencies

```bash
npm i
```

- Initialize the local PostgreSQL database.

```bash
npm run docker:db
```

### API (/api)

- Set up the local database connection config through "/api/.env"
- Install dependencies

```bash
composer install
```

- Start the development server (Install Artisan CLI in case of error)

```bash
php artisan serve
```

### UI (/ui)

- Install dependencies

```bash
npm i
```

- Start the development server

```bash
npm run dev
```

## Author

Linkedin: [linkedin.com/in/ivan-torres-garcia](linkedin.com/in/ivan-torres-garcia)

## License

[GNU GPLv3](https://choosealicense.com/licenses/gpl-3.0/)

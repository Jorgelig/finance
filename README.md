<h1 align="center">FINANCE</h1>

<p align="center">
  <b>FINANCE is a simple yet powerful, self-hosted finance tracking web app with the ability to parse SMS transactions and generate very useful insights about your money</b>
</p>

<p align="center"><img src="./public/images/finance.jpg" /></p>
<p align="center"><a href="#" target="__blank"><img height="40" src="./public/images/video.png" /></a></p>

## 💰 Sponsors
Support this project by becoming a sponsor ❤️. Your logo will show up here with a link to your website. [Become a sponsor](https://opencollective.com/larecipe)

## 🛠 Features

1. [x] Self-hosted - full control over your data privacy 
2. [x] Parse SMS bank transactions
3. [x] Detailed analysis of income and expenses 

## 🎮 Demo

Try the app with [live demo](https://finance-demo.saleem.dev/).

## ▶️ Installation 

> Docker Installation

```bash
git clone https://github.com/saleem-hadad/finance && cd finance

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

cp .env.sail.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan finance:install
```

Once done, visit the app on `http://localhost`


> Normal Laravel App

If you wish installing the app using normal Laravel environment, make sure you have PHP, MySQL, and composer already installed and then run the following commands:

```bash
git clone https://github.com/saleem-hadad/finance && cd finance

cp .env.example .env

composer install

php artisan key:generate

php artisan migrate

php artisan finance:install

php artisan serve
```

Once done, visit the app on `http://localhost:8000`


Read [full documentation](https://finance-demo.saleem.dev/docs)

## 🪚 Built with

1. Laravel
2. Inertia & ReactJs
3. GraphQL
4. MySQL
5. Docker

## 🔖 License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/saleem-hadad/finance/blob/main/LICENSE) file for details.

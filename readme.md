# AgroSearch Test Assignment

## Requirements
- `PHP` equal or higher version 8.3
- `PostgreSQL`equal or higher version 15
- `Docker` equal or higher version 27.1.1, build 6312585
- `Docker Compose` equal or higher version v2.29.1-desktop.1

## Installation
1. Install Docker with Docker compose | [Instuction](https://docs.docker.com/engine/install/)
2. Clone a repository
```
git clone https://github.com/ryandevz/agrosearch-test.git
cd agrosearch-test
```

3. Create copy of enviroment file
```bash
cp .env.example .env
```

4. Run containers
```bash
docker compose up -d
```
5. Install composer dependencies
```bash
. ./alias
composer install
# or 
docker compose run --rm composer install
```

6. Generate application key
```bash
. ./alias
artisan key:generate
# or 
docker compose run --rm artisan key:generate
```

7. Data migration and seeding to database
Migrate
```bash
. ./alias
artisan migrate --seed
# or 
docker compose run --rm artisan migrate --seed
```

8. Application available by address `http://localhost/`

## Authors
- [ryandev](https://github.com/ryandevz)
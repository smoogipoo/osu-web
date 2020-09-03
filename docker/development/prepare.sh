#!/bin/sh

set -e
set -u

scriptdir="$(dirname "$0")"
cd "$scriptdir/../.."

if [ ! -f artisan ]; then
    echo "This script is being run from unexpected place"
    exit 1
fi

_run() {
    docker-compose run --rm php "$@"
}

_run_dusk() {
    docker-compose run --rm -e APP_ENV=dusk.local php "$@"
}

genkey=0
if [ ! -f .env ]; then
    echo "Copying default env file"
    cp .env.example .env
    genkey=1
fi

_run composer install

_run artisan dusk:chrome-driver

if [ "$genkey" = 1 ]; then
    echo "Generating app key"
    _run artisan key:generate
fi

if [ ! -f .docker/.composer/auth.json ]; then
    echo "Copying default composer auth file"
    mkdir -p .docker/.composer
    cp .docker/.composer-auth.json.example .docker/.composer/auth.json
fi

if [ ! -f .env.testing ]; then
    echo "Copying default test env file"
    cp .env.testing.example .env.testing
fi

if [ ! -f .env.dusk.local ]; then
    echo "Copying default dusk env file"
    cp .env.dusk.local.example .env.dusk.local
    echo "Generating app key for dusk"
    _run_dusk artisan key:generate
fi

if [ -d storage/oauth-public.key ]; then
    echo "oauth-public.key is a directory. Removing it"
    rmdir storage/oauth-public.key
fi

if [ ! -f storage/oauth-public.key ]; then
    echo "Generating passport key pair"
    _run artisan passport:keys
fi

if [ ! -f .docker/.my.cnf ]; then
    echo "Copying default mysql client config"
    cp .docker/.my.cnf.example .docker/.my.cnf
fi

echo "Preparation completed. Adjust .env file if needed and run 'docker-compose up' followed by running migration."

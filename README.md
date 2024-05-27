# Pokemon TGC

PHP web application that uses the Pokémon TCG API (https://pokemontcg.io/) to display Pokémon cards.

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d` to set up and start a fresh Symfony project
4. Run `docker exec -it pokemon-tcg-php-1 bash` to enter in a docker container
5. Run `compose install` to install the system and the dependencies
6. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
7. Run `docker compose down --remove-orphans` to stop the Docker containers.

**Enjoy!**

## License

Symfony Docker is available under the MIT License.

## Credits

Created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).

# Contacts App

Contacts CRUD using Symfony.

[![PHP](https://img.shields.io/badge/PHP-777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
![Symfony](https://img.shields.io/badge/symfony-%23000000.svg?style=for-the-badge&logo=symfony&logoColor=white) ![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

## Features

List the key features or functionalities of your project.

- Register and login
- Contacts CRUD, with Twig templates and using SB Admin theme
https://github.com/StartBootstrap/startbootstrap-sb-admin-2
- Testing case

## Installation

1. Clone the repository: `git clone https://github.com/leonardooliveira951/contacts-app.git`
2. Easily build docker images, install composer dependencies and start containers with Makefile: `make docker-install`
3. Open `http://localhost:8060` in your browser
## Testing

- To run all tests, run: `make docker-test`
- To run specific test using --filter flag, run: `make docker-test-filter filter=testName`

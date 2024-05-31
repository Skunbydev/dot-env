# dot-env

Simple library for managing environment variables in PHP.

# Projeto com Variáveis de Ambiente em PHP

Este projeto demonstra como carregar e utilizar variáveis de ambiente a partir de um arquivo `.env` em um projeto PHP.

## Passo 1: Crie o arquivo `.env`

Primeiro, crie um arquivo `.env` no diretório raiz do seu projeto (ou em outro diretório de sua escolha). Adicione suas variáveis de ambiente nele. Por exemplo:

```sh
APP_NAME="Qualquer Nome"
APP_ENV=local
APP_DEBUG=true
DB_HOST=servidor(por padrao, localhost)
DB_PORT=3306
DB_DATABASE=nome_banco
DB_USERNAME=root
DB_PASSWORD=senha
```

## Passo 2: Adicione a biblioteca `skunbydev\DotEnv` ao seu projeto

Instale a biblioteca via Composer:

```sh
composer require skunbydev/dotenv
```

## Passo 3: Carregue as variáveis de ambiente no seu script PHP

No início do seu script PHP principal (por exemplo, index.php), carregue as variáveis de ambiente usando a classe Environment.

```sh
require_once __DIR__ . '/vendor/autoload.php';

use Skunbydev\DotEnv\Environment;

// Defina o caminho absoluto para o diretório onde está o arquivo .env
$dotenvPath = __DIR__; // ou especifique o caminho diretamente

// Carregue as variáveis de ambiente
try {
    Environment::load($dotenvPath);
} catch (Exception $e) {
    // Trate o erro de carregamento do arquivo .env
    echo 'Erro ao carregar as variáveis de ambiente: ',  $e->getMessage(), "\n";
    exit;
}

// Agora você pode acessar as variáveis de ambiente
echo getenv('APP_NAME'); // Output: Aplicacao
echo $_ENV['DB_HOST']; // Output: localhost


```
## Passo 4: Utilize as variáveis de ambiente no seu projeto
Depois de carregar as variáveis de ambiente, você pode acessá-las em qualquer lugar do seu projeto usando getenv(), $_ENV, ou $_SERVER.

Por exemplo, em outro script PHP:
```sh
<?php

// Acesse as variáveis de ambiente carregadas
$appName = getenv('APP_NAME');
$dbHost = $_ENV['DB_HOST'];
$dbUsername = $_SERVER['DB_USERNAME'];

// Use as variáveis conforme necessário
echo "Application Name: $appName\n";
echo "Database Host: $dbHost\n";
echo "Database Username: $dbUsername\n";
```

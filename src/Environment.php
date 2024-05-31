<?php
namespace Skunbydev\DotEnv;

class Environment
{

  /**
   * Método responsável por carregar as variáveis de ambiente do projeto
   * @param  string $dir Caminho absoluto da pasta onde encontra-se o arquivo .env
   * @throws \Exception
   */
  public static function load($dir)
  {
    //VERIFICA SE O ARQUIVO .ENV EXISTE
    $envFile = $dir . '/.env';
    if (!file_exists($envFile)) {
      throw new \Exception("Arquivo .env não encontrado no diretório especificado: $dir");
    }

    //LÊ O CONTEÚDO DO ARQUIVO .ENV
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
      // IGNORA COMENTÁRIOS
      if (strpos(trim($line), '#') === 0) {
        continue;
      }

      //PARSE DA LINHA
      list($name, $value) = explode('=', $line, 2);

      //REMOVE ASPAS AO REDOR DO VALOR, SE PRESENTES
      $value = trim($value);
      if (preg_match('/^"(.*)"$/', $value, $matches) || preg_match("/^'(.*)'$/", $value, $matches)) {
        $value = $matches[1];
      }

      //DEFINE A VARIÁVEL DE AMBIENTE
      putenv("$name=$value");
      $_ENV[$name] = $value;
      $_SERVER[$name] = $value;
    }
  }

}
?>
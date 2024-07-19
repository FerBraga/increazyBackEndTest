# API CEP. 

# Contexto
Este projeto trata-se de uma simples API em PHP/Laravel com uma rota GET para realizar uma requisição e obter dados do endereço pelo CEP informado.


## Desenvolvimento 

> 
    Após clonar o repositório acesse a pasta raíz e rode o comando `composer install` para instalar as dependências do projeto e então
    e crie um arquivo .env seguindo o exemplo do .env.example e add a variável `API_CEP_BASE_URL=https://viacep.com.br/ws/` a ele.
 

## Executando aplicação

* Para rodar o servidor:

  ```
   Rode o comando `php artisan serve` para  inicializar a aplicação. Uma vez iniciado acesso pela URL: 'http://127.0.0.1:8000/api/search/local/'.
    Abaixo exemplo de request com response dos dados obtidos.
  ```

 ## Rota
 
 * Rota padrão:
 
 <img src="./Captura de tela 2024-07-18 192932.png">

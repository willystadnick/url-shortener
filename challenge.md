# Desafio PHP Laravel | Encurtador de URLs

## Apresentação

Neste teste você deverá desenvolver uma API RESTful simples para encurtar URLs, similar aos serviços bit.ly, goo.gl, tinyURL e outros.

Você não precisa desenvolver o cliente que irá utilizar a API, apenas o backend.

Algumas características que o seu serviço deverá ter são:

- Seguir as boas práticas de desenvolvimento de APIs RESTful;
- Usar git para versionamento. A hospedagem da aplicação pode ser feita em qualquer serviço que você já tem costume de usar (github, bitbucket, gitlab, etc.), e você pode compartilhar conosco o projeto através de um desses serviços ou nos enviar o pacote em formato ZIP (neste caso, lembre-se de incluir a pasta .git no momento da compactação);
- Você poderá disponibilizar este desafio publicamente se assim desejar, desde que não mencione o nome do projeto ou da empresa (secret001);
- A autenticação do usuário não é necessária para teste desafio;
- O projeto deve conter um arquivo README.md explicando as dependências e etapas de instalação (em Inglês ou Português);
- A inicialização do projeto deve ser possível executando os comandos padrões `composer install` e `php artisan migrate`. Se houver uma alimentação inicial de dados do banco, ela deve ser feita executando o comando `php artisan db:seed`.

## Avaliação

- A avaliação será feita instalando o seu projeto em um droplet na Digital Ocean preparado para rodar o projeto padrão Laravel (utilizando Ubuntu, PHP 7.2, Apache e Laravel 5.6), e acessando através da ferramenta Postman os endpoints que forem disponibilizados.
- O banco de dados que iremos usar é o SQLite no próprio droplet da aplicação, mas o projeto deverá poder ser adaptado para outros bancos de dados também (MySQL/MariaDB e PostgreSQL, por exemplo), através do ORM Eloquent.
- Siga o padrão de desenvolvimento que achar mais prático e confortável para você (TDD, DDD, BDD, etc.). O que iremos analisar é a clareza e consistência do seu código.
- Se você já tem experiência com [Postman](https://www.getpostman.com), pode compartilhar com a gente a sua coleção de rotas utilizadas para testes da API.
- Todas as rotas devem ter suas entradas e saídas de dados exclusivamente em JSON (Header “Accept: application/json”);

## Aplicação

A lista abaixo compreende as ações mínimas que a aplicação deverá realizar.

Você pode incrementar outras ações, se achar necessário, porém um usuário da aplicação deverá poder, no mínimo:

- Cadastrar uma URL, gerando a sua versão minificada. Esta versão será uma rota na própria aplicação, sendo composta pelo domínio ou IP da máquina e uma hash única de até 16 dígitos (ex.: https://secret001.me/ajb12p6t4a);
- Consultar os detalhes de uma URL minificada;
- Contar o número de acessos em determinada URL minificada;
- Quando acessada a rota da url minificada, ela deverá redirecionar para a URL original com o [status 301](https://httpstatuses.com/301);
- Permitir a edição (da URL de destino e de sua hash) ou exclusão de uma URL minificada do banco de dados. Apenas quem a cadastrou poderá editá-la ou excluí-la. Lembrando que não é necessário desenvolver a autenticação dos acessos. Seja criativo ;)

## Endpoints sugeridos

### GET /{hash}

Redireciona o usuário para a URL original, com o status 301.

### GET /urls/{hash ou ID}

Retorna os detalhes da URL minificada. Esta rota pode ser pública.

### POST /urls

Cadastrar uma nova URL e retorna a sua versão minificada. O usuário deverá passar como parâmetro mínimo a URL original, e a API deverá retornar, no mínimo, a URL minificada para acesso.

### POST /urls/{hash ou ID}

Permite a edição dos detalhes de um registro de URL minificada. Apenas quem a cadastrou poderá editá-la.

### DELETE /urls/{hash ou ID}

Remove um registro específico de uma URL minificada. Apenas quem a cadastrou poderá removê-la.

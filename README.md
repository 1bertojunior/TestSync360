# Test-Sync360

Este repositório destina-se ao teste de desenvolvimento full stack na Sync360. O objetivo é demonstrar habilidades em criar soluções web com HTML, CSS, JS, PHP, MySQL, Docker, Git/GitHub, Bootstrap e Laravel.

## Instalação

1. Clone o repositório para a sua máquina local:

```bash
git clone https://github.com/1bertojunior/TestSync360.git
```

2. Navegue até o diretório do projeto:
```bash
cd Test-Sync360
```

3. Cofnigure o arquivo .env
Configure o DB_HOST para que  aponte para o serviço de banco de dados no ambiente do Docker. 

```bash
APP_NAME="Test Sync360"
APP_ENV=dev
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=sync360-db
DB_USERNAME=sync360-db-user
DB_PASSWORD=sync360-db-password
...
```

4. Executando o aplicativo com o Docker Compose

```bash
docker-compose build app
```

Pode levar alguns minutos para completar (a depender da máquina). O resultado é similar a este:

```bash
Output
Building app
Step 1/X : FROM php:8.1-fpm
...
Successfully built fe176ff4702b
Successfully tagged sync360-app:latest
```

Após concluir a compilação, executar o ambiente em segundo plano com:

```bash
docker-compose up -d
```

Saída similar a:

```bash
Output
Creating sync360-db    ... done
Creating sync360-app   ... done
Creating sync360-nginx ... done
```

Executar o composer install para instalar as dependências do aplicativo:

```bash
docker-compose exec app composer install
```

Resultado como este:

```bash
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
...
Package manifest generated successfully.    
```
Antes de testar o aplicativo, deve-se gerar uma chave única para o aplicativo com a artisan

```bash
docker-compose exec app php artisan key:generate
```

Saída esperada:

```
Output
Application key set successfully.
```

Instale as dependências JavaScript via npm (lembre-se de instalar o node e npm):

```bash
npm install
```

Posteriomente  compilar o scaffolding com o comadno. 

```bash
npm run dev
```

Vamos rodar as migrations da aplicação, apra crias as tabelas do banco de dados:

```bash
docker-compose exec app php artisan migrate  
```

Posteriomente, popular as tabelas necesssárias com o Seeder:

```bash
docker-compose exec app php db:seed   
```

A aplicação está funcioando: 
Acesse pelo navegador o nome de domínio ou endereço IP do seu servidor na porta 8000:

```bash
http://server_domain_or_IP:8000
```

Registre um novo usuário e desfrute dos requisitos solciaitnos na descrição do teste.

Descrição:

- A página deve conter uma seção de informações do usuário, incluindo uma imagem de perfil, nome, idade, rua, bairro, estado e biografia.

- Abaixo da seção de informações do usuário, deve haver um formulário para atualização das informações pessoais do usuário. O formulário deve incluir campos para atualizar o nome, idade, endereço e biografia do usuário.

- Quando o usuário preencher e enviar o formulário, as informações atualizadas devem ser exibidas na seção de informações do usuário.

- A página deve ser responsiva e ter uma aparência agradável em dispositivos móveis e desktops.



```bash



```




```bash


```





```bash


```





```bash

```




```bash



```



```bash


```





```bash


```





```bash

```




```bash



```
# API LARAVEL LISTA DE TAREFA

## User story
- Criar uma conta para o usuário
- o usuário precisará logar a conta caso contrário será negado acesso a criação ou a edição de tarefas
- O usuário logado poderá ver todas tarefas
- O usuário poderá criar, editar ou excluir somente suas tarefas


## Deployment

Para instalar o projeto você precisa do **Docker** e **Dockercompose** instalado em sua máquina


Clone esse repositório
```git
  git clone Angeloabrita/task-api
```


Copie o modelo e gere uma nova ``.ENV``
```bash
cp .env.example .env
```
Abra o arquivo ``.ENV``edite e adicione uma senha ao ``DB_PASSWORD=``


Teste para ver se o Docker está rodando

```bash
docker --version
```
Gere as images/cointener com o comando

```bash
docker compose up -d
```
Remove o ``composer.lock`` e instale o composer
```bash 
docker-compose exec app rm -rf vendor composer.lock
docker-compose exec app composer install
```

## Documentação da API

Esta API é construída usando o framework Laravel e possui as seguintes rotas:

### Rotas de autenticação

| Método | Endpoint | Descrição | Parâmetros |
| --- | --- | --- | --- |
| POST | /auth/login | Esta rota é usada para login de usuário | email: O email do usuário<br>senha: A senha do usuário |
| POST | /auth/logout | Esta rota é usada para logout de usuário |  |
| POST | /auth/register | Esta rota é usada para registro de usuário | nome: O nome do usuário<br>email: O email do usuário<br>senha: A senha do usuário<br>confirmação de senha: A confirmação da senha |

### Rotas protegidas

Estas rotas são protegidas pelo middleware `auth:sanctum` e só podem ser acessadas por usuários autenticados:

| Método | Endpoint | Descrição | Parâmetros |
| --- | --- | --- | --- |
| POST | /auth/store | Esta rota é usada para armazenar uma tarefa | tarefa: A tarefa a ser armazenada |
| PUT | /auth/update/{id} | Esta rota é usada para atualizar uma tarefa | tarefa: A tarefa a ser atualizada |
| DELETE | /auth/delete/{id} | Esta rota é usada para excluir uma tarefa | id: O id da tarefa a ser excluída |

### Rotas públicas

| Método | Endpoint | Descrição |
| --- | --- | --- |
| GET | /v1/task | Esta rota é usada para buscar todas as tarefas |
| GET | /v1/task/{id} | Esta rota é usada para buscar uma tarefa específica por id |

**Nota**: Todas as rotas retornam dados json.
## License

[MIT](https://choosealicense.com/licenses/mit/)


## Authors

- [@Angelo Abrita](https://www.linkedin.com/in/angelo-gabriel-tavares-abrita)


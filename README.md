# API LARAVEL LISTA DE TAREFA

## User story
- Criar uma conta para o usuário
- o usuário precisará logar a conta caso contrário será negado acesso a criação ou a edição de tarefas
- O usuário logado poderá ver todas tarefas
- O usuário poderá criar, editar ou excluir somente suas tarefas


## Deployment

Para instalar o projeto você precisa do **Docker** instalado em sua máquina


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
Agora gere a base de dados usando o **artisan**

```bash
docker-compose exec app php artisan migrate

```

Se tudo der certo ao acessar a URL

```
GET /api/tasks
```
Você obterá um erro **404**, isso porque ainda não existe nenhuma tarefa criada.




## Documentação da API

#### Autentificação e criação de usuario
**Novo usuriario**
```http
  POST /api/auth/register
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `nome` `email` `password`     | `json` | **Obrigatório**. todos os parametros |

Retorna `200 ok`

```json
    {
    "status": true,
    "message": "User Created Successfully",
    "token": "1|1QCJBQSDKXIUxeeeF07qoxoSzWN2PiK448NZv8qa"
    }
```

**Login usuario**
```http
  POST /api/auth/login
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `email` `password`     | `json` | **Obrigatório**. todos os parametros |

Retorna `200 ok`

```json
    {
      "status" => true,
      "message" => "User Logged In Successfully",
      "token" =>  "1|1QCJBQSDKXIUxeeeF07qoxoSzWN2PiK448NZv8qa"
    }
```





### Acesso aos metodos **publicos** `GET`

#### Retorna todas as task do banco
```http
  GET /api/tasks
```
###

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `-` | `json` | Retorna todas as taks no banco |

#### retornar uma só task

```http
  GET /api/task/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `json` | **Obrigatório**. O ID da task que você quer |



### Acesso aos metodos **privados** `GET` `PUT` `DELETE`
Para acessar os metados privados o usuario precisa autentificar o token

#### Cria uma task no banco
```http
  POST /api/store
```
###

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `token` `title` `text` | `json` |  **Obrigatório**. `user_id` |

#### Update uma task

```http
  PUT /api/update/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`       | `json` | **Obrigatório**. O ID do item que você quer  atualizar |

#### Delete uma task

```http
  DELETE /api/delete/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`       | `json` | **Obrigatório**. O ID do item que você quer deletar |


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Authors

- [@Angelo Abrita](https://www.linkedin.com/in/angelo-gabriel-tavares-abrita)


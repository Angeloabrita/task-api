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
  gh repo clone Angeloabrita/task-api
```


Crie uma alias da ``Sail``
```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Copie o modelo e gere uma nova ``.ENV``
```bash
cp .env.example .env
sail artisan key:generate
```
O ``.ENV`` precisa conter esses atributos ```bash
WWWGROUP=1000
WWWUSER=1000 ``` caso contrário ocorrerá erro ao gerar os build com ``compose up``


```senão ocorrerá erro ao gerar o 
Teste para ver se o Docker está rodando

```bash
docker --version
```

Você poderá gerar as images/cointener com o comando

```bash
    docker compose up
```
Execute as migrações
```bash 
    sail artisan migrate
```


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

``

## TO-DO
- Criar as polices para validar se o usuário autenticado pode deletar ou atualizar task
- Conectar ao front para primeiro teste








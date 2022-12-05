# API LARAVEL LISTA DE TAREFA

## User story
- Criar uma conta para o usuário
- o usuário precisará logar a conta caso contrário será negado acesso a criação ou a edição de tarefas
- O usuário logado poderá ver todas tarefas
- O usuário poderá criar, editar ou excluir somente suas tarefas

### Como usar
clone esse repositório.
Para subir os container precisará ter Docker instalado em sua máquina.

execute o comando 
```bash
    ./vendor/bin/sail up
```

## Criação de usuário
Método **POST** ``http://127.0.0.1:80/api/auth/register``
passe como parâmetro um **nome** **email** **password**
Exemplo:
```json
{
    "nome":"goku",
    "email":"goku@gmail.com",
    "password":"69696969"
}

```
Se tudo der certo o retorno será o status 200 como o token

```json
    {
    "status": true,
    "message": "User Created Successfully",
    "token": "1|1QCJBQSDKXIUxeeeF07qoxoSzWN2PiK448NZv8qa"
    }
```
## SESSION LOGED
Para acessar as rotas protegidas você precisará configurar a **Autorization** com o ``Brarer Token`` no Headers

Com a session ative agora você poderá acessar as rotas protegidas pelo middleware do Sanctum

### ```POST``
- ``store`` - Esse método criar um registro na tabela task

Esse metodo tem como fillable os campos ``title``, ``user_id``,``text`` você precisa insieie

route ``http://127.0.0.1:80/api/store``
  
Se tudo der certo o retorn será o registro

```json
{
    "id": 2,
    "title": "Dragon ball z",
    "user_id": 1,
    "text": "fjdoifjapofijafpoaijfapoifjapfoiajfpaoifjapofijadoifj",
    "created_at": "2022-12-05T04:35:11.000000Z",
    "updated_at": "2022-12-05T04:35:11.000000Z"
}

```

### ```PUT``  
- ``update`` - Esse metodo atualiza um registro na tabela task

route ``http://127.0.0.1:80/api/update/{id}``
  
Se tudo der certo o retorn será o registro atualizad

```json
{
    "id": 2,
    "title": "Dragon ball z",
    "user_id": 1,
    "text": "fjdoifjapofijafpoaijfapoifjapfoiajfpaoifjapofijadoifj",
    "created_at": "2022-12-05T04:35:11.000000Z",
    "updated_at": "2022-12-05T04:35:11.000000Z"
}

```

### ```DEL``
- ``destroy`` - Esse metodo deleta um registro na tabela task


route ``http://127.0.0.1:80/api/delete/{id}``
  
Se tudo der certo o retorn será o registro

```json
{
    "status": "okay"
}

```
- Criar as polices para validar se o usuario autenticado pode deletar ou atualizar task
- Conectar ao front para primeiro teste







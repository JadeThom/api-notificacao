# 📦 API de Notificações — Laravel

API REST desenvolvida em **Laravel**, voltada para **consumo externo**, com **autenticação por token**, **integração com banco de dados externo**, **processamento assíncrono com filas**.

---

## 🎯 Objetivo do Projeto

- Criação de **API RESTful**
- Autenticação com **Laravel Sanctum**
- Consumo de **banco de dados externo**
- Importação de dados de forma assíncrona
- Uso de **Queues e Jobs**
- Organização do código com **Service Layer**
- Controle de acesso e rate limit
- Boas práticas de arquitetura

---

### Padrões Aplicados

- Service Layer
- Command Pattern
- Job Queue
- Strategy Pattern (canais de notificação)
- Idempotência (`updateOrCreate`)
- Logs estruturados

---

## 🔐 Autenticação

A API utiliza **Laravel Sanctum**, com autenticação via **Bearer Token**.


## 🔐 Autenticação

A API utiliza **Laravel Sanctum**, com autenticação via **Bearer Token**.

### Login

```http
POST /api/login
```

### Body
```http
{
"email": "usuario@exemplo.com",
"password": "senha"
}
```

### Resposta
```http
{
"token": "SEU_TOKEN_DE_ACESSO"
}
```

### Headers obrigatórios
```http
{
Authorization: Bearer SEU_TOKEN_DE_ACESSO
Accept: application/json
}
```
### 📌 Versionamento da API

A API é versionada para facilitar manutenção e evolução.

```http
/api/v1
```

### 🛣 Rotas da API

Prefixo padrão:


### Notificações
| Método | Rota                             | Descrição                 |
|------|----------------------------------|---------------------------|
| GET  | /api/v1/notificacoes             | Listar notificações       |
| POST | /api/v1/notificacoes             | Criar notificação         |
| GET  | /api/v1/notificacoes/{id}        | Visualizar notificação    |
| PUT  | /api/v1/notificacoes/{id}        | Atualizar notificação     |
| DELETE | /api/v1/notificacoes/{id}        | Remover notificação       |
| POST | /api/v1/notificacoes/{id}/enviar | Enviar notificação        |

---

### 🔄 Integração com Banco de Dados Externo

A aplicação consome dados de um banco PostgreSQL externo, mantendo o domínio desacoplado.

```http
Variáveis de Ambiente
DB_EXTERNAL_HOST=127.0.0.1
DB_EXTERNAL_PORT=5432
DB_EXTERNAL_DATABASE=banco_externo
DB_EXTERNAL_USERNAME=postgres
DB_EXTERNAL_PASSWORD=secret
```

### 📥 Importação de Usuários do Banco Externo

A importação é feita de forma assíncrona, simulando um cenário real de integração entre sistemas.

**Command de Importação**
```http
php artisan externo:importar-usuarios
```

### ⚙️ Filas (Queue)

O processamenro assícrono utiliza **Queues do Laravel.**

**Executar o Worker**
```http
php artisan queue:work
```

## 🚀 Funcionalidades

### 📌 Notificações
- Criar notificação
- Listar notificações
- Visualizar notificação
- Atualizar notificação
- Remover notificação
- Enviar notificação por canal

---
## 📦 Exemplo de Payload (POST)

```json
{
  "titulo": "Nova mensagem",
  "mensagem": "Você recebeu uma nova mensagem",
  "canal": "email",
  "status": "pendente"
}

# Clonar o repositório
git clone https://github.com/seu-usuario/api-notificacoes.git

# Entrar no projeto
cd api-notificacoes

# Instalar dependências
composer install

# Criar arquivo .env
cp .env.example .env

# Gerar chave
php artisan key:generate

# Rodar migrations
php artisan migrate

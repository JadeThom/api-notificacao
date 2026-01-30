# 📬 API de Notificações — Laravel

API REST desenvolvida em **Laravel** com foco em **boas práticas, arquitetura limpa e simulação de cenários reais**, como consumo de dados externos e extração de informações de banco externo.

Este projeto foi criado com objetivo **exclusivo de portfólio**, demonstrando domínio em desenvolvimento backend com Laravel.

---

## 🎯 Objetivo do Projeto

Fornecer uma API responsável por:

- Gerenciar notificações (e-mail, SMS e push)
- Controlar status de envio
- Registrar logs de envio
- Simular consumo de dados externos
- Simular extração de dados de banco externo
- Aplicar rate limit em rotas sensíveis

Tudo isso utilizando **boas práticas de arquitetura**, separação de responsabilidades e código limpo.

---

### Principais conceitos aplicados:
- Service Layer
- Enums para domínio
- Controllers enxutos
- Responsabilidade única
- Código desacoplado
- API stateless

---

## 🚀 Funcionalidades

### 📌 Notificações
- Criar notificação
- Listar notificações
- Visualizar notificação
- Atualizar notificação
- Remover notificação
- Enviar notificação por canal

---

## 🧪 Simulação de Integrações Externas

### 🔹 Consumo de API externa
Simulação de consumo via `Http::fake()` para cenários como:
- APIs de terceiros
- Serviços governamentais
- Sistemas legados

### 🔹 Banco de dados externo
Simulação de conexão externa usando:
- Conexões múltiplas no `database.php`
- Services responsáveis pela extração de dados

Isso demonstra preparo para ambientes corporativos reais.

---

## ⏱ Rate Limiting

O projeto utiliza **Rate Limiter** nativo do Laravel.

### Limites configurados:
- API geral: **60 requisições por minuto**
- Envio de notificações: **10 envios por minuto por IP**

Proteção contra abuso e sobrecarga da API.

---

## 🛣 Rotas da API

Prefixo padrão:


### Notificações
| Método | Rota                              | Descrição                 |
|------|-----------------------------------|---------------------------|
| GET  | /api/notificacoes                 | Listar notificações       |
| POST | /api/notificacoes                 | Criar notificação         |
| GET  | /api/notificacoes/{id}            | Visualizar notificação    |
| PUT  | /api/notificacoes/{id}            | Atualizar notificação     |
| DELETE | /api/notificacoes/{id}          | Remover notificação       |
| POST | /api/notificacoes/{id}/enviar     | Enviar notificação        |

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

# Subir servidor
php artisan serve

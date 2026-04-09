# 🎵 Band Manager API

API REST para gestão de bandas e álbuns, desenvolvida com **Laravel 12** e **SQLite**.

## 🚀 Tecnologias
- **PHP 8.2+** | **Laravel 12**
- **Sanctum:** Autenticação via Token (Bearer).
- **SQLite:** Banco de dados local.
- **Actions Pattern:** Lógica de negócio isolada em classes específicas.

## 🛠️ Instalação Rápida

```bash
# Clone e entre na pasta
git clone https://github.com/seu-usuario/repo.git
cd repo

# Instale dependências e configure o .env
composer install
cp .env.example .env
php artisan key:generate

# Migre o banco com o usuário de teste
# (admin@teste.com / 123456)
php artisan migrate --seed

# Inicie o servidor
php artisan serve
```

## 📡 Endpoints (API)

> **Importante:** Use o Header `Accept: application/json` em todas as requisições.

| Categoria | Método | Rota | Protegida? |
| :--- | :--- | :--- | :--- |
| **Auth** | `POST` | `/api/register` | Não |
| **Auth** | `POST` | `/api/login` | Não |
| **User** | `GET` | `/api/user` | Sim |
| **Bands** | `ANY` | `/api/bands` | Sim |
| **Albums** | `ANY` | `/api/albums` | Sim |
| **Members**| `ANY` | `/api/members`| Sim |

## 🏗️ Estrutura do Projeto
- **Actions:** `app/Actions/` (Lógica de escrita)
- **Requests:** `app/Http/Requests/` (Validações)
- **Resources:** `app/Http/Resources/` (Formatação da resposta)

---

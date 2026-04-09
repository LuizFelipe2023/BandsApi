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

🏗️ Estrutura do Projeto
O projeto segue o padrão de Camadas, separando responsabilidades para facilitar a manutenção:

Actions: app/Actions/ — Onde a "mágica" acontece (Lógica de negócio pura).

Requests: app/Http/Requests/ — Onde barramos dados inválidos (Validação).

Resources: app/Http/Resources/ — Onde escolhemos o que o frontend vai ver (Transformação).

Models: app/Models/ — Representação das tabelas e seus relacionamentos (Eloquent).

Migrations: database/migrations/ — O histórico de evolução do banco de dados.

Seeders: database/seeders/ — Dados iniciais para teste e desenvolvimento.

---

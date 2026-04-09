
---

```markdown
# 🎵 Band Manager API

API RESTful para gestão de bandas, álbuns e membros, desenvolvida com **Laravel 12** e **SQLite**.

## 🚀 Tecnologias
- **PHP 8.2+** | **Laravel 12**
- **Sanctum:** Autenticação via Token (Bearer).
- **SQLite:** Banco de dados leve e local.
- **Actions Pattern:** Lógica de negócio isolada em classes específicas para maior manutenibilidade.

## 🏗️ Estrutura do Projeto
O projeto foi construído separando responsabilidades para facilitar a expansão (ex: futuro frontend em Vue.js):

* **Actions (`app/Actions/`):** Onde reside a lógica de negócio pura (criação, edição, autenticação).
* **Requests (`app/Http/Requests/`):** Camada de validação de dados de entrada.
* **Resources (`app/Http/Resources/`):** Formatação e padronização das respostas JSON.
* **Models (`app/Models/`):** Representação das tabelas e relacionamentos Eloquent.
* **Migrations & Seeders:** Histórico do banco e dados de teste.

## 🛠️ Instalação Rápida

```bash
# Clone o repositório e entre na pasta
git clone [https://github.com/seu-usuario/repo.git](https://github.com/seu-usuario/repo.git)
cd repo

# Instale as dependências do Composer
composer install

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Execute as migrations e popule o banco
# Usuário padrão: admin@teste.com | Senha: 123456
php artisan migrate --seed

# Inicie o servidor local
php artisan serve
```

## 📡 Endpoints (API)

> **Atenção:** É obrigatório enviar o Header `Accept: application/json` em todas as requisições para garantir o retorno correto de erros.

| Categoria | Método | Rota | Protegida? |
| :--- | :--- | :--- | :--- |
| **Auth** | `POST` | `/api/register` | ❌ Não |
| **Auth** | `POST` | `/api/login` | ❌ Não |
| **User** | `GET` | `/api/user` | ✅ Sim |
| **Auth** | `POST` | `/api/logout` | ✅ Sim |
| **Bands** | `ANY` | `/api/bands` | ✅ Sim |
| **Albums** | `ANY` | `/api/albums` | ✅ Sim |
| **Members**| `ANY` | `/api/members`| ✅ Sim |
| **Genres** | `ANY` | `/api/genres` | ✅ Sim |

---
Desenhado para ser escalável e fácil de integrar com frameworks modernos como Vue.js.
```
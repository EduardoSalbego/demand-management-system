# Sistema de Gestão de Demandas

Este projeto é uma aplicação web para gerenciamento de tarefas e demandas, desenvolvida como parte do desafio técnico de Onboarding. O sistema permite o controle completo (CRUD) de demandas, com funcionalidades de segurança, relatórios visuais (Dashboard) e filtros de pesquisa.

---

## Tecnologias Utilizadas

-   **Framework:** Laravel 10
-   **Linguagem:** PHP 8.1+
-   **Banco de Dados:** SQLite
-   **Frontend:** Blade Templates com **AdminLTE 3** (Bootstrap 4)

---

## Funcionalidades Principais

### 1. Painel de Controle (Dashboard)

-   Visualização rápida de KPIs (Key Performance Indicators).
-   Contadores de demandas Totais, Pendentes e Urgentes.
-   Atalhos rápidos para ações comuns.

### 2. Gestão de Demandas (CRUD)

-   **Listagem:** Visualização paginada com identificação visual de status.
-   **Filtros Inteligentes:** Filtragem rápida por status sem recarregar toda a página.
-   **Criação/Edição:** Validação rigorosa no Backend (regras de datas futuras, tamanho de texto, etc).
-   **Exclusão Segura:** Implementação de `SoftDeletes` para manter histórico e integridade dos dados.

### 3. Segurança e Controle de Acesso

-   **Autenticação:** Proteção de rotas via Middleware (apenas usuários logados acessam o sistema).
-   **Autorização (Policies):** Implementação de Policies nativas do Laravel para garantir que um usuário não possa visualizar, editar ou excluir demandas de outro usuário.

---

## Guia de Instalação e Execução

Siga os passos abaixo para rodar o projeto na sua máquina.

### 1. Pré-requisitos

Tenha instalado:

-   PHP >= 8.1
-   Composer
-   Git

### 2. Clonar e Configurar

```bash
# Clone o repositório
git clone <URL_DO_SEU_REPOSITORIO>

# Entre na pasta
cd gestao-demandas

# Instale as dependências do PHP
composer install

# Instale as dependências do Frontend e compile os assets
npm install && npm run build

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 3. Configurar Banco de Dados (SQLite)

Como o projeto utiliza SQLite, não é necessário instalar o MySQL/Postgres. Basta criar o arquivo vazio do banco:

**No Linux/Mac:**

```bash
touch database/database.sqlite
```

**No Windows:**

```bash
New-Item database/database.sqlite
```

### 4. Migrações e Dados de Teste (Seeders)

Execute as migrações para criar as tabelas.

Nota: É preciso criar uma conta de usuário no sistema (Register) antes de rodar o comando de seed, para que as demandas fictícias sejam atreladas ao seu usuário.

```bash
# Cria as tabelas
php artisan migrate

# (Opcional) Após criar seu usuário no sistema, rode para gerar dados:
php artisan db:seed
```

### 5. Executar o Projeto

```bash
php artisan serve
```

Acesse em seu navegador: http://localhost:8000

Desenvolvido por Eduardo Salbego

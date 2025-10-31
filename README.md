# Super Gestão

Sistema de gestão empresarial desenvolvido com Laravel 7.

## 📋 Requisitos

- PHP >= 7.2.5
- Composer
- Node.js >= 12.x e NPM
- MySQL >= 5.7 ou MariaDB >= 10.2
- Extensões PHP: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

## 🚀 Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/Mauriciodalligna/SuperGestao.git
cd SuperGestao
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Configurar ambiente

Copie o arquivo de exemplo de configuração:

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure as seguintes variáveis:

```env
APP_NAME="Super Gestão"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=super_gestao
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Gerar chave da aplicação

```bash
php artisan key:generate
```

### 5. Criar banco de dados

Crie um banco de dados MySQL com o nome configurado no `.env`:

```sql
CREATE DATABASE super_gestao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Executar migrations

```bash
php artisan migrate
```

### 7. (Opcional) Popular banco de dados com dados de exemplo

```bash
php artisan db:seed
```

### 8. Instalar dependências JavaScript

```bash
npm install
```

### 9. Compilar assets

Para desenvolvimento:

```bash
npm run dev
```

Ou para produção:

```bash
npm run prod
```

Para desenvolvimento com watch (compila automaticamente ao salvar arquivos):

```bash
npm run watch
```

## 🌐 Executar o projeto

### Servidor de desenvolvimento

```bash
php artisan serve
```

O projeto estará disponível em: `http://localhost:8000`

### Servidor com hot reload (assets)

Em um terminal, execute:

```bash
php artisan serve
```

Em outro terminal, execute:

```bash
npm run hot
```

Acesse: `http://localhost:8000` (os assets serão recarregados automaticamente)

## 📁 Estrutura do Projeto

```
app_super_gestao/
├── app/
│   ├── Http/
│   │   └── Controllers/     # Controladores da aplicação
│   ├── Fornecedor.php       # Model Fornecedor
│   ├── SiteContato.php      # Model SiteContato
│   └── User.php             # Model User
├── config/                   # Arquivos de configuração
├── database/
│   ├── migrations/          # Migrations do banco de dados
│   └── seeds/              # Seeders para popular dados
├── public/                  # Arquivos públicos (CSS, JS, imagens)
├── resources/
│   ├── views/              # Views Blade
│   ├── js/                 # Arquivos JavaScript
│   └── sass/               # Arquivos SASS
└── routes/
    └── web.php             # Rotas da aplicação
```

## 🗄️ Banco de Dados

O projeto utiliza as seguintes tabelas:

- `users` - Usuários do sistema
- `site_contatos` - Contatos recebidos pelo formulário
- `fornecedores` - Cadastro de fornecedores
- `produtos` - Cadastro de produtos
- `produtos_detalhes` - Detalhes dos produtos
- `unidades` - Unidades de medida
- `failed_jobs` - Jobs que falharam na execução

## 🛣️ Rotas Principais

- `/` - Página inicial
- `/sobre-nos` - Página sobre nós
- `/contato` - Página de contato (GET) e envio de formulário (POST)
- `/login` - Página de login
- `/app/clientes` - Área de clientes
- `/app/fornecedores` - Área de fornecedores
- `/app/produtos` - Área de produtos

## 🔧 Comandos Úteis

### Limpar cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Criar novo controller

```bash
php artisan make:controller NomeController
```

### Criar nova migration

```bash
php artisan make:migration nome_da_migration
```

### Executar migrations

```bash
php artisan migrate
```

### Reverter última migration

```bash
php artisan migrate:rollback
```

### Criar novo seeder

```bash
php artisan make:seeder NomeSeeder
```

## 📝 Notas Importantes

- Certifique-se de que o servidor MySQL está rodando antes de executar as migrations
- O arquivo `.env` não deve ser commitado no repositório (já está no `.gitignore`)
- Para produção, altere `APP_DEBUG=false` e `APP_ENV=production` no arquivo `.env`

## 🐛 Troubleshooting

### Erro: "Class not found"

Execute:

```bash
composer dump-autoload
```

### Erro de permissão na pasta storage

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Erro ao executar migrations

Verifique se:
- O banco de dados existe
- As credenciais no `.env` estão corretas
- O usuário do MySQL tem permissões adequadas

## 👨‍💻 Desenvolvimento

Desenvolvido com:
- Laravel 7
- PHP 7.2.5+
- MySQL
- Bootstrap (via Laravel Mix)
- SASS

## 📄 Licença

Este projeto está sob a licença MIT.

# 🎯 Sistema de Gerenciamento de Academia  
Projeto desenvolvido em Laravel 12 e PostgreSQL como parte do Trabalho de Conclusão de Curso (TCC) da FATEC.

Este sistema tem como objetivo auxiliar a administração de academias de pequeno porte, oferecendo funcionalidades como gerenciamento de alunos, planos, pagamentos, presenças, usuários e envio de notificações por e-mail.

---

## 📌 Tecnologias Utilizadas

- **PHP 8.4+**
- **Laravel 12**
- **Composer 2.8+**
- **PostgreSQL**  
- **MaterializeCSS**
- **Blade Templates**
- **Gmail SMTP** para envio de e-mails
- **NPM** (para assets e dependências front-end)

---

## 📁 Estrutura do Projeto
/app
/Models
/Http/Controllers
/resources
/views
/routes
web.php
/database
/migrations
/seeders
/public


--

## ⚙️ Pré-requisitos

Antes de instalar o projeto, garanta que possui:

- PHP 8.4 ou superior  
- Composer instalado  
- Node.js + npm  
- Servidor PostgreSQL  
- Extensões do PHP adequadas (pdo_pgsql, openssl, mbstring, tokenizer etc.)

---

## 🚀 Instalação do Projeto

### 1️⃣ Clonar o repositório


```bash
git clone https://github.com/SEU-USUARIO/seu-projeto.git
cd seu-projeto
```

Instalar dependências do PHP (Laravel)
```bash
composer install
```

Instalar dependências do front-end
```bash
npm install
```

Se desejar compilar assets:
```bash
npm run dev
```


🛠 Configuração do Ambiente
4️⃣ Criar o arquivo .env
cp .env.example .env

5️⃣ Gerar a chave da aplicação
php artisan key:generate

6️⃣ Configurar o banco de dados no .env

Exemplo:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=academia
DB_USERNAME=postgres
DB_PASSWORD=suasenha

📬 Configuração do Gmail (Envio de E-mails)

No .env, configure:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu-email@gmail.com
MAIL_PASSWORD=sua-senha-ou-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=seu-email@gmail.com
MAIL_FROM_NAME="Sistema Academia"


⚠️ Importante:
Ative “Senha de App” no Gmail caso use autenticação de 2 fatores.

🗃 Executar Migrations + Seed
7️⃣ Criar tabelas no banco de dados
php artisan migrate

8️⃣ Rodar o Seeder (cria automaticamente o usuário administrador)
php artisan db:seed


O seed cria um usuário administrador padrão:

E-mail: admin@academia.com
Senha: 123456

▶️ Executar o Servidor
php artisan serve


Acesse no navegador:

http://127.0.0.1:8000

🔐 Login no Sistema

Após rodar os seeds:

Administrador

- Email: admin@academia.com

- Senha: 123456

O administrador possui acesso total:

* Alunos

* Pagamentos

* Presenças

* Planos

* Usuários

* Notificações

* Instrutor

Criado manualmente via painel de administração ou pelo seed adicional (se configurado).

📦 Funcionalidades
✔ Administrador

* Cadastro e gestão de alunos

* Cadastro de planos

* Controle de pagamentos

* Envio de notificações

* Controle de usuários

* Dashboard com indicadores

✔ Instrutor

* Registro de presenças

* Consulta de alunos

🧪 Testes (Opcional)
php artisan test

📄 Licença

Projeto acadêmico desenvolvido para fins educacionais como parte do TCC da FATEC.

🤝 Autores
* João Pedro Meneguesso
* Arthur Minoru Maezono
FATEC — Faculdade de Tecnologia • Curso: Análise e Desenvolvimento de Sistemas

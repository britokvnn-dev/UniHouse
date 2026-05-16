<div align="center">
  <div style="background-color: #2563eb; padding: 20px; border-radius: 10px; display: inline-block; margin-bottom: 20px;">
    <h1 style="color: white; margin: 0;">🏡 UniHouse</h1>
  </div>
  <p><strong>A sua moradia ideal, perto da faculdade.</strong></p>
  <p>O UniHouse é uma plataforma desenvolvida para conectar estudantes universitários a proprietários de imóveis, repúblicas, quartos e kitnets, facilitando o aluguel seguro e prático.</p>
</div>

<br>

## 🚀 Funcionalidades e Perfis de Usuário

O sistema foi arquitetado em **Laravel 11** e conta com 3 níveis de acesso bem definidos:

### 🎓 1. Estudante
- Navegação livre pela vitrine de imóveis disponíveis.
- Sistema de filtros de busca por cidade ou nome do imóvel.
- Acesso à tela detalhada do imóvel com informações sobre quartos, pets, mobilia, etc.
- Acesso ao botão **"Entrar em Contato"** (WhatsApp direto com o locador) apenas se estiver logado.
- Opção de evoluir sua conta para "Locador" através do painel de **Meu Perfil** em 1 clique.

### 🔑 2. Locador
- Painel para criação de Anúncios.
- Dashboard próprio (Meu Perfil) listando todas as suas propriedades cadastradas.
- Fluxo de qualidade: Todo anúncio recém-criado entra como **"Pendente"** e aguarda aprovação de um Administrador antes de aparecer na página inicial.

### 🛡️ 3. Administrador (Gerente)
- Possui o **Painel Admin** exclusivo.
- Responsável pelo fluxo de qualidade: Visualiza todos os anúncios pendentes, analisa os dados e possui a decisão de **Aprovar** ou **Rejeitar**.

---

## 🛠️ Tecnologias Utilizadas
- **Backend:** PHP & Laravel 11
- **Banco de Dados:** SQLite (Fácil portabilidade, zero-configuração)
- **Frontend / Design:** Blade Templates & Tailwind CSS v4
- **Bundler:** Vite

---

## ⚙️ Como baixar e rodar o projeto (Instalação)

Se você é desenvolvedor da equipe e acabou de baixar (clonar) este repositório, o projeto ainda não tem os pacotes e nem o banco de dados instalados na sua máquina. Siga os passos abaixo:

### Pré-requisitos:
- PHP instalado na máquina
- Node.js e NPM instalados
- Composer instalado

### Método Automático (Apenas Windows) ⚡
1. Vá até a pasta do projeto.
2. Dê **dois cliques** no arquivo `setup.bat`.
3. Aguarde ele baixar tudo e criar o banco de dados sozinho.

### Método Manual (Mac/Linux/Windows) ⌨️
Abra o terminal na pasta do projeto e rode os comandos em ordem:

1. **Instale os pacotes do PHP e do Node:**
   ```bash
   composer install
   npm install
   ```

2. **Crie e configure o arquivo `.env`:**
   Copie o arquivo `.env.example` e renomeie a cópia para `.env`.
   Verifique se a variável de banco de dados está apontando para o SQLite:
   ```env
   DB_CONNECTION=sqlite
   ```

3. **Gere a chave de segurança do Laravel:**
   ```bash
   php artisan key:generate
   ```

4. **Crie o Banco de Dados e os usuários padrão:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Caso o terminal pergunte se você deseja criar o arquivo database.sqlite, confirme com 'yes')*

5. **Ligue os Servidores:**
   Abra dois terminais diferentes na pasta do projeto.
   No primeiro: `php artisan serve`
   No segundo: `npm run dev`

Pronto! Acesse pelo seu navegador em `http://localhost:8000`.

---

## 👑 Contas Padrão (Seeders)
Após rodar o comando de `seed` no passo de instalação, o sistema já virá configurado com dois Administradores Mestre para você testar a moderação de anúncios:

**Admin 1 (Nathan):**
- Email: `nathanz.mrs@gmail.com`
- Senha: `Nathan2829`

**Admin 2 (Kelvinn):**
- Email: `kelvinnbrito@gmail.com`
- Senha: `123123`

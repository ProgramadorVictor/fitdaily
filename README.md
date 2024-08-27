# Fitdaily - Sistema de Academia

O **Fitdaily** é um sistema desenvolvido para a academia "Fitdaily" como parte da conclusão do curso Técnico de Informática do Instituto Federal do Espírito Santo (IFES). Os colaboradores do projeto foram Victor Rocha, Yara Dionisio e Daniel Ramalho.

## Descrição

O Fitdaily é uma academia fictícia para a qual foi desenvolvido um sistema que permite interação entre alunos e treinadores, gerenciamento de treinos, controle de pagamentos, e muito mais.

## Funcionalidades

- **Sistema de Cadastro e Login:** Permite o cadastro de novos clientes com informações pessoais e de contato.
- **Gerenciamento de Treinos:** Criação e edição de treinos personalizados.
- **Controle de Pagamentos:** Exibição do extrato e vencimento da mensalidade.
- **Validação de Cadastro/Recuperação de Senha por Email:** Recuperação de senha via email.
- **Utilização de API do Mercado Pago:** Integração para pagamentos.
- **Planos e Mensalidades:** Dados dinâmicos de planos e mensalidades.
- **Edição de Informações Pessoais:** Atualização de e-mail, telefone e foto de perfil.
- **Listar Treinos:** Exibição dos treinos e exercícios.
- **Chatbox com API Pusher:** Chatbox para interação entre alunos e treinadores.

## Tecnologias Utilizadas

- **Linguagem de Programação:** PHP
- **Frameworks:** Laravel
- **Banco de Dados:** MySQL
- **Frontend:** HTML, CSS, JavaScript, jQuery, Bootstrap
- **Ferramentas:** Git

## Requisitos da Instalação

- **PHP:** 7.3^
- **Composer:** 2.5.5^

## Instalação

Para rodar o projeto em sua máquina local, siga os passos abaixo:

1. **Clone o Repositório:**
   ```bash
   git clone https://github.com/ProgramadorVictor/sistema_de_academia.git

2. **Tenha a ídeia que esses são os atributos que vão ser modificados na .env:**
- `MERCADO_PAGO_ACCESS_TOKEN` - `BROADCAST_DRIVER` - `DB_DATABASE` - `DB_USERNAME` - `DB_PASSWORD` - `QUEUE_CONNECTION` `MAIL_MAILER`- `MAIL_HOST`- `MAIL_PORT`- `MAIL_USERNAME`- `MAIL_PASSWORD`- `MAIL_ENCRYPTION`- `PUSHER_APP_ID`- `PUSHER_APP_KEY`- `PUSHER_APP_SECRET`- `PUSHER_APP_CLUSTER`
  
4. **Troque o nome do arquivo .env.example para .env:**
      Troque o nome do arquivo `.env.example` para `.env`.

5. **Configure a chave da API do Mercado Pago:**
   Abra o arquivo `.env` e coloque a chave da API do Mercado Pago
   MERCADO_PAGO_ACCESS_TOKEN=sua_chave_aqui

3. **Instale as dependências:**
    Abra o terminal e digite o comando abaixo:
    composer install

4. **Gere a chave de criptografia da Aplicação**
    Abra o terminal e digite o comando abaixo:
    php artisan key:generate

5. **Configure o seu banco de dados:**
    No arquivo `.env` configure o seu banco de dados
    DB_DATABASE=nome_do_banco DB_USERNAME=usuario_do_banco DB_PASSWORD=senha_do_banco

6. **Gerando as tabelas e colunas no banco de dados:**
    Abra o terminal e digite o comando abaixo:
    php artisan migrate --seed
*Nota: A seeder contém usuarios gerados.*

7. **Configurando o broadcasting e disparo assincrono:**
    Faça essas modificações no arquivo `.env`:
    QUEUE_CONNECTION=database BROADCAST_DRIVER=pusher

8. **Configure o disparo de email:**
    Modifique os atributos para dispara o email na `.env`:
    MAIL_MAILER=your_mail_service MAIL_HOST=your_mail_host MAIL_PORT=your_mail_port MAIL_USERNAME=your_email_username MAIL_PASSWORD=your_email_password MAIL_ENCRYPTION=your_email_encryption

9. **Configure a API do Pusher broadcasting:**
    Modifique o arquivo  `.env` para pusher broadcasting:
    PUSHER_APP_ID=your_pusher_app_id PUSHER_APP_KEY=your_pusher_app_key PUSHER_APP_SECRET=your_pusher_app_secret PUSHER_APP_CLUSTER=your_pusher_app_cluster

11. **Começe o servidor e os jobs:**
    Abra dois terminal e digite os comandos abaixo em cada.   
     ```
     php artisan serve
     ```
     ```
     php artisan queue:work
     ```

@echo off
echo ========================================================
echo        Configurando o projeto UniHouse (Primeiro Uso)
echo ========================================================

echo.
echo [1/5] Instalando dependencias do PHP (Composer)...
call composer install

echo.
echo [2/5] Instalando dependencias do Frontend (NPM)...
call npm install

echo.
echo [3/5] Criando o arquivo de configuracao .env...
copy .env.example .env

echo.
echo [4/5] Gerando chave de seguranca do Laravel...
call php artisan key:generate

echo.
echo [5/5] Construindo o Banco de Dados (SQLite) e inserindo Admins...
call php artisan migrate:fresh --seed --force

echo.
echo ========================================================
echo VIVA! O projeto foi configurado com sucesso!
echo ========================================================
echo.
echo O que fazer agora?
echo 1. Abra um terminal e digite: php artisan serve
echo 2. Abra outro terminal e digite: npm run dev
echo.
pause

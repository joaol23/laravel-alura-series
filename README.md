A Small
# Alura Series Project

Projeto que foi feito para estudar alguns conceitos de laravel.

Assuntos como
 - Envio de emails
 - Eventos assincronos
 - Uploads
 - Validações
 - Sessões/Login
 - Testes
 - Fila
 - Entre outros

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/joaol23/laravel-alura-series
```

Entre no diretório do projeto

```bash
  cd laravel-alura-series
```

Instale as dependências

```bash
  composer install
  npm install
```

Inicie o container

```bash
  sail up -d
```

Rode as migrate

```bash
  sail php artisan migrate
```

Inicie o front

```bash
  npm run dev
```

E abra na porta 8000


## Referência

 - [Curso alura](https://cursos.alura.com.br/formacao-laravel)


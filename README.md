# Auto Veloz Search

Teste - Mecanismo de Busca com Filtros Combinados (Laravel + Livewire).

Este projeto consiste na implementação de um mecanismo de busca com filtros combinados utilizando Laravel e Livewire. O ambiente de desenvolvimento é baseado em Docker, e o repositório inclui toda a configuração necessária para a execução do projeto.

## Funcionalidades

- Busca de produtos em tempo real
- Filtro por nome do produto
- Filtro por múltiplas categorias
- Filtro por múltiplas marcas
- Parâmetros de busca persistentes na URL
- Funcionalidade de limpar filtros
- Design responsivo
- Testes automatizados
- Ordenação por nome, preço e data

## Requisitos

- Docker
- Docker Compose
- PHP 8.2 ou superior
- Composer
- Node.js & NPM

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/gabrielbomfimoliveira/Auto-Veloz-Search.git
cd Auto-Veloz-Search
```

2. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Inicie os containers Docker:
```bash
docker-compose up -d
```

4. Instale as dependências PHP:
```bash
docker-compose exec app composer install
```

5. Instale as dependências NPM:
```bash
npm install
```

6. Gere a chave da aplicação:
```bash
docker-compose exec app php artisan key:generate
```

## Executando os Testes

Para executar os testes automatizados:

```bash
docker-compose exec app php artisan test
```

7. Execute as migrações e seeders:
```bash
docker-compose exec app php artisan migrate --seed
```

8. Compile os assets:
```bash
npm run build
```

## Executando a Aplicação

A aplicação estará disponível em `http://localhost:8000`

## Desenvolvimento

- A aplicação utiliza Laravel Livewire para funcionalidade em tempo real
- Tailwind CSS é utilizado para estilização
- O componente de busca está localizado em `app/Livewire/ProductSearch.php`
- As views estão localizadas em `resources/views/livewire/`
- Os testes estão localizados em `tests/Feature/Livewire/`

## Estrutura do Projeto

```
auto-veloz-search/
├── app/
│   ├── Livewire/
│   │   └── ProductSearch.php
│   └── Models/
│       ├── Brand.php
│       ├── Category.php
│       └── Product.php
├── database/
│   ├── factories/
│   │   ├── BrandFactory.php
│   │   ├── CategoryFactory.php
│   │   └── ProductFactory.php
│   ├── migrations/
│   │   ├── create_brands_table.php
│   │   ├── create_categories_table.php
│   │   └── create_products_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       └── livewire/
│           └── product-search.blade.php
├── tests/
│   └── Feature/
│       └── Livewire/
│           └── ProductSearchTest.php
├── docker-compose.yml
├── Dockerfile
└── README.md
```

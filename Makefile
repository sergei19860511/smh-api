init: install stop clear optimize start

.PHONY: help

SAIL := ./vendor/bin/sail

install: ## Setup project and install dependencies.
	@cp .env.example .env
	@composer install
	@npm install
	@php artisan key:generate

start: ## Start containers.
	$(SAIL) up -d
	@npm run dev

stop: ## Stop containers.
	$(SAIL) stop

clear: ## Clear application and configuration cache.
	$(SAIL) artisan optimize:clear

optimize: ## Cache config and routes.
	$(SAIL) artisan optimize && $(SAIL) artisan route:trans:cache

.DEFAULT_GOAL := help

notify = osascript -e 'display notification $(1) with title "MB"'

up: ## Starts docker containers and builds the application
	./vendor/bin/sail up -d
	./vendor/bin/sail bun run build
	docker-compose ps

watch: ## Starts docker containers and watch/rebuild on file changes
	./vendor/bin/sail bun install
	./vendor/bin/sail bun run dev

js:
	./vendor/bin/sail bun install
	./vendor/bin/sail bun run build

down: ## Stops and removes docker containers
	./vendor/bin/sail down

ssh: ## SSH into the main container
	./vendor/bin/sail shell

ssh-root: ## SSH into the main container as root
	./vendor/bin/sail root-shell

setup: ## Run setup to create ENV
	#cp .env.example .env
	composer install
	./vendor/bin/sail up -d
	./vendor/bin/sail composer install
	./vendor/bin/sail bun install
	./vendor/bin/sail artisan key:generate
	./vendor/bin/sail artisan migrate:fresh --seed
	$(call notify, "Environment Ready")

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST)  | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-16s\033[0m %s\n", $$1, $$2}'

destroy:
	docker-compose down --rmi all --volumes --remove-orphans

install:		# Эта команда полезна при первом клонировании репозитория (или после удаления зависимостей).
	composer install
brain-games:	# Запуск php bin/brain-games
	./bin/brain-games
validate:		# make validate выполнит composer validate
	composer validate
lint:			# Проверка кода (линтер) по стандарту PSR12
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:		# Запуск php bin/brain-even
	./bin/brain-even
brain-calc:		# Запуск php игры
	./bin/brain-calc
brain-gcd:		# Запуск php игры
	./bin/brain-gcd
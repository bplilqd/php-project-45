install:		# Эта команда полезна при первом клонировании репозитория (или после удаления зависимостей).
	composer install
brain-games:	# Запуск php bin/brain-games.php
	./bin/brain-games
validate:		# make validate выполнит composer validate
	composer validate
lint:			# Проверка кода (линтер) по стандарту PSR12
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:		# Запуск php bin/brain-even
	./bin/brain-even
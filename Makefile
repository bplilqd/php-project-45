install: # Эта команда полезна при первом клонировании репозитория (или после удаления зависимостей).
	composer install
brain-games: # Запуск php old comand bin/brain-games.php
	./bin/brain-games
validate: # make validate выполнит composer validate
	composer validate
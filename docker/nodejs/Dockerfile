FROM node:20-alpine


RUN apk update && apk add --no-cache bash curl git shadow
WORKDIR /var/www/html
#COPY www/html/package*.json /var/www/
# Проверяем, есть ли уже группа с GID 1000, если нет — создаем
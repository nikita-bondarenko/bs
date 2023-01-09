FROM nginx:latest

RUN rm -rf /usr/share/nginx/html/*

RUN rm /etc/nginx/conf.d/default.conf

#COPY /secret /etc/nginx/ssl

COPY /nginx/nginx.conf /etc/nginx/conf.d

COPY . /usr/share/nginx/html

CMD ["nginx", "-g", "daemon off;"]

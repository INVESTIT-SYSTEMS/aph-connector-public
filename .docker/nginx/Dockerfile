FROM library/nginx:1.20.1

ENV UNIX_USER=1000

# create user owner
RUN useradd -u ${UNIX_USER} owner
RUN chsh -s /bin/bash owner

RUN sed -i -e 's/user nginx;/user owner;/g' /etc/nginx/nginx.conf

RUN apt-get update
RUN apt-get install -y curl

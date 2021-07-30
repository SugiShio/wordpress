FROM node:14

ENV LANG C.UTF-8

RUN mkdir /app
WORKDIR /app

ADD . /app

RUN npm install

CMD npm run watch

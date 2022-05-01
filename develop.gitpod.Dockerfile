FROM nginx:alpine

USER root:root

RUN apk --no-cache add shadow

RUN usermod -u 33333 nginx

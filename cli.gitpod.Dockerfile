FROM wordpressdevelop/cli:latest

USER root:root

RUN useradd -u 33333 gitpod && adduser gitpod sudo && cd /var/www && mkdir -p /conf.d/ && chown -R gitpod:gitpod /conf.d/ && echo '%sudo ALL=(ALL) NOPASSWD:ALL' | tee -a /etc/sudoers

RUN rm /entrypoint.sh

COPY ./cli-entrypoint.sh /entrypoint.sh

USER 33333:33333

ENTRYPOINT [ "/entrypoint.sh" ]
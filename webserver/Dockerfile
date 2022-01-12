FROM bitnami/minideb:buster
VOLUME /srv/webserver
COPY provision.sh *.ini /root/
# COPY vendor "${TMPDIR:-/tmp/}"/vendor
RUN /root/provision.sh
WORKDIR /srv/webserver/
# ENV PATH "$PATH:/opt/mssql-tools/bin/"

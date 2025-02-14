# syntax=docker/dockerfile:1
FROM varnish:7.6

LABEL maintainer="Sp25 ESOF 423 Group 3 <daniel.defrance@montana.edu>" \
      org.label-schema.name="hrdc-intranet-varnish" \
      org.label-schema.description="HRDC Intranet Varnish image." \
      org.label-schema.vendor="Sp25 ESOF 423 Group 3"

COPY etc/varnish.vcl /etc/varnish/default.vcl

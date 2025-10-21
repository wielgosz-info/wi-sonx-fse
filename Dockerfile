FROM mcr.microsoft.com/devcontainers/typescript-node:22-bookworm

# Install the latest version of yarn
ENV YARN_VERSION=stable
RUN corepack enable && yarn set version ${YARN_VERSION}

# Override the node entrypoint
COPY ./docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

WORKDIR /workspaces/${THEME_SLUG:-wi-sonx-fse}

EXPOSE 8887
VOLUME [ "/workspaces/${THEME_SLUG:-wi-sonx-fse}", "/workspaces/${THEME_SLUG:-wi-sonx-fse}/node_modules" ]

CMD [ "/bin/sh", "-c", "sleep infinity" ]

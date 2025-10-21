FROM mcr.microsoft.com/devcontainers/typescript-node:22-bookworm

# Install bash, git, and openssh-client
RUN mkdir -p /home/node/.ssh
RUN ln -s /run/secrets/user_ssh_key /home/node/.ssh/id_ed25519

# Install the latest version of yarn
ENV YARN_VERSION=stable
RUN corepack enable && yarn set version ${YARN_VERSION}

# Save github.com's key
# RUN echo "github.com ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQCj7ndNxQowgcQnjshcLrqPEiiphnt+VTTvDP6mHBL9j1aNUkY4Ue1gvwnGLVlOhGeYrnZaMgRK6+PKCUXaDbC7qtbW8gIkhL7aGCsOr/C56SJMy/BCZfxd1nWzAOxSDPgVsmerOBYfNqltV9/hWCqBywINIR+5dIg6JTJ72pcEpEjcYgXkE2YEFXV1JHnsKgbLWNlhScqb2UmyRkQyytRLtL+38TGxkxCflmO+5Z8CSSNY7GidjMIZ7Q4zMjA2n1nGrlTDkzwDCsw+wqFPGQA179cnfGWOWRVruj16z6XyvxvjJwbz0wQZ75XK5tKSb7FNyeIEs4TT4jk+S4dhPeAUC5y+bDYirYgM4GC7uEnztnZyaVWQ7B381AK4Qdrwt51ZqExKbQpTUNn+EjqoTwvqNj4kqx5QUCI0ThS/YkOxJCXmPUWZbhjpCg56i+2aB6CmK2JGhn57K5mj0MNdBXA4/WnwH6XoPWJzK5Nyu2zB3nAZp+S5hpQs+p1vN1/wsjk=" > /home/node/.ssh/known_hosts

# Override the node entrypoint
COPY ./docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

WORKDIR /workspaces/${THEME_SLUG:-wi-sonx-fse}

EXPOSE 8887
VOLUME [ "/workspaces/${THEME_SLUG:-wi-sonx-fse}", "/workspaces/${THEME_SLUG:-wi-sonx-fse}/node_modules" ]

CMD [ "/bin/sh", "-c", "sleep infinity" ]

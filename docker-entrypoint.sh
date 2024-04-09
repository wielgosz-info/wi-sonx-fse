#!/bin/sh
set -euo pipefail

# This script is used to configure the container after starting.
# It needs an access to the mounted volumes.

git fetch
yarn install

# Remove the vite-dev-server.json file if it exists,
# because it can cause issues with the site preview
# if the dev server is not running.
rm dist/vite-dev-server.json 2>/dev/null || echo 'No dev manifest to remove'

exec "$@"

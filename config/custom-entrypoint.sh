#!/bin/sh

# Wait for the httpd service to be up (you might need to adjust the waiting condition)
while ! nc -z localhost 8000; do
  echo "Waiting for httpd service to be up..."
  sleep 2
done

# Run the initialization script
chmod +x /opt/config/init.sh
/opt/config/init.sh

# Execute the original command
exec "$@"

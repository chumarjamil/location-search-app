#!/bin/bash

# Build and start containers
docker-compose up -d --build

# Wait for the database to be ready
echo "Waiting for database connection..."
sleep 10

# Run Laravel migrations and seeders
docker-compose exec backend php artisan migrate --force
docker-compose exec backend php artisan db:seed --force

echo "Setup complete! Access the application at:"
echo "Frontend: http://localhost:3000"
echo "Backend API: http://localhost:8000/api/locations?search=ban" 
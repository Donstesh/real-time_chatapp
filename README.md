# Laravel Real-Time Monitoring & Broadcasting Dashboard

This project integrates Laravel with real-time broadcasting using **Reverb**, system metrics via **Spatie Prometheus**, and visualization in **Grafana**. It is divided into the following sections:

## Features

- Prometheus metrics exposed via `/metrics` endpoint.
- Laravel Horizon metrics collection.
- Grafana dashboards with real-time visualizations.

## Requirements

- Laravel 11+
- PHP 8.3+ with `pcntl` extension
- Prometheus
- Grafana
- Node.js (for Laravel Echo, broadcasting, etc.)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Donstesh/real-time_chatapp.git
cd real-time_chatapp
composer install
npm install && npm run build

run database migrations 
Register to have access to all the servies since its locked with auth and sanctum authentiction

Go to database and change one user to admin for accessing the horizon and pulse dashboards

to start the service 

php rtisan serve
php artisan horizon

To access the realtime dashboard visit http://127.0.0.1:8000/chat
To access the horizon dashboard go to http://127.0.0.1:8000/horizon

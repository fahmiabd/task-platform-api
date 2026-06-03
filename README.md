# Task Platform API

A distributed task processing platform built with Laravel, PostgreSQL, and NATS.

This service acts as the API gateway and task producer. It receives task requests, stores them in PostgreSQL, and publishes events to NATS for downstream workers.

## Architecture

```text
Client
  ↓
Laravel API
  ↓
PostgreSQL
  ↓
NATS
  ↓
Workers (Go)
```

## Features

* Create tasks via REST API
* Store task metadata in PostgreSQL
* Publish task events to NATS
* Event-driven architecture
* Ready for worker-based task processing

## Tech Stack

* Laravel 13
* PostgreSQL
* NATS
* Docker

## Getting Started

### Prerequisites

* PHP 8.3+
* Composer
* Docker
* PostgreSQL
* NATS Server

### Installation

Clone the repository:

```bash
git clone git@github.com:fahmiabd/task-platform-api.git
cd task-platform-api
```

Install dependencies:

```bash
composer install
```

Copy environment variables:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### Database Configuration

Update `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_platform
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

Run migrations:

```bash
php artisan migrate
```

### NATS Configuration

Update `.env`:

```env
NATS_HOST=127.0.0.1
NATS_PORT=4222
```

### Run Application

```bash
php artisan serve
```

## API

### Create Task

**POST** `/api/tasks`

Request:

```json
{
  "type": "email.send",
  "payload": {
    "to": "fahmi@example.com",
    "subject": "Welcome",
    "body": "Hello"
  }
}
```

Response:

```json
{
  "task_id": "019e8bfa-a909-724c-87b7-c953f5bad8ac"
}
```

## Event Format

Subject:

```text
tasks.email.send
```

Payload:

```json
{
  "task_id": "019e8bfa-a909-724c-87b7-c953f5bad8ac",
  "payload": {
    "to": "fahmi@example.com",
    "subject": "Welcome",
    "body": "Hello"
  }
}
```

## Roadmap

* [x] Task creation API
* [x] PostgreSQL persistence
* [x] NATS publishing
* [ ] Go worker service
* [ ] JetStream integration
* [ ] Task status tracking
* [ ] Retry mechanism
* [ ] Dead Letter Queue (DLQ)
* [ ] Monitoring dashboard

## License

MIT

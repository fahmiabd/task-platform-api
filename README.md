# Task Platform API

Task Platform API is a Laravel-based service responsible for creating and managing asynchronous tasks. The service stores task metadata in PostgreSQL and publishes task events to NATS for processing by workers.

## Tech Stack

* Laravel 13
* PHP 8.4+
* PostgreSQL
* NATS

## Features

* Create asynchronous tasks
* Store task metadata in PostgreSQL
* Publish task events to NATS
* Retrieve task details
* Track task lifecycle status

## Task Lifecycle

```text
pending
processing
completed
failed
```

## API Endpoints

### Create Task

```http
POST /api/tasks
```

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
  "id": "019ea58c-9235-70d1-8dd3-3158ba789400",
  "status": "pending"
}
```

### Get Task Detail

```http
GET /api/tasks/{id}
```

Response:

```json
{
  "id": "019ea58c-9235-70d1-8dd3-3158ba789400",
  "type": "email.send",
  "payload": {},
  "status": "completed",
  "started_at": null,
  "completed_at": null
}
```

## Local Development

### Install Dependencies

```bash
composer install
```

### Environment

```bash
cp .env.example .env
php artisan key:generate
```

Configure PostgreSQL and NATS connection.

### Run Migration

```bash
php artisan migrate
```

### Start Server

```bash
php artisan serve
```

## Architecture

```text
Client
  ↓
Task Platform API
  ↓
PostgreSQL

Task Platform API
  ↓
NATS
  ↓
Task Platform Worker
```

## Future Improvements

* NATS JetStream
* Retry mechanism
* Dead Letter Queue (DLQ)
* Task scheduling
* Metrics and monitoring
* Authentication & authorization

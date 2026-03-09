# Blog Application (Laravel)

## Requirements

Make sure the following tools are installed:

- **Node.js**: 20.x
- **NPM**: 10.x
- **Docker**: 26.x
- **Docker Compose**: 1.25.x

---

## Installation

### 1. Clone the Repository

```bash
git clone git@github.com:artisozolin/blog-app.git
cd blog-app
```

### 2. Build and Start Docker Containers

```bash
docker-compose build
docker-compose up -d
```

### 3. Install Composer Dependencies

```bash
docker exec -it blog-app composer install
```

### 4. Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Edit `.env` and adjust database credentials and other environment variables.

### 5. Generate Laravel Application Key

```bash
docker exec -it blog-app php artisan key:generate
```

### 6. Run Database Migrations

```bash
docker exec -it blog-app php artisan migrate:fresh
```

### 7. Set up Storage for Uploaded Images

```bash
docker exec -it blog-app php artisan storage:link
```
This will create a symbolic link so that uploaded images in storage/app/public are accessible via public/storage.

### 8. Fix File Permissions

```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

### 9. Create an Admin/User Account (Required for Image Uploads)

The app requires a logged-in user to add posts. Run:

```bash
docker exec -it blog-app php artisan create:user
```

Then follow the prompts:

```
Enter username:
> usernameExample

Enter password:
> password

Confirm password:
> password

User 'usernameExample' created successfully!
```

---

## Frontend Setup

### 1. Install NPM Dependencies

```bash
npm install
```

### 2. Compile Assets

For development:

```bash
npm run dev
```

---

## Access the App

- Open your browser at `http://localhost` (or your Docker port configuration).

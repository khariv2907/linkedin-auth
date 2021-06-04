# LinkedIn OAuth
## Project Set Up
### Step 1. Clone from the GitHub
```bash
git clone https://github.com/khariv2907/linkedin-auth.git
```
### Step 2. Go to the project directory.
```bash
cd linkedin-auth
```
### Step 3. Add Permission
```bash
sudo chown -R $USER: .
```
### Step 4. Copy .env
```bash
cp .env.example .env
```
### Step 5. Install Composer packages
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```
### Step 6. Create alias for the Sail
Add alias for the current session
```bash
alias sail='bash vendor/bin/sail'
```

### Step 7. Build and Start Docker Containers
```bash
sail build
sail up -d
```
### Step 8. Install node modules and build assets
```bash
sail npm install
sail npm run prod
```
### Step 9. Generate key and run migrations
```bash
sail shell
php artisan key:generate
php artisan migrate
```

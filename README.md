# About Vorjosov

## Installation

### Follow the instructions below for installation the project

1) #### Clone the repository with following command

```bash
git clone https://github.com/Dorsone/vorjosov.git
```

2) #### Run ```composer install```
3) #### Configure the ```.env``` file
4) #### Generate app key with the following command

```bash
php artisan key:generate
```

5) #### Run migrations with seeder

```bash
php artisan migrate:fresh --seed
```

6) #### Run server, with ```php artisan serve```

## Usage

There is a console command for getting auth token, so run the command below and follow instructions:

```bash
php artisan auth:login
```

#### In the [index](http://127.0.0.1:8000/) page you can test the api endpoints. There are 4 api endpoints, and you can use it with postman(also there is a [collection](https://github.com/Dorsone/vorjosov/blob/master/vorjosov.postman_collection.json)) or you can use web interface

#### Also, there are [events](http://127.0.0.1:8000/events) and [my-objects](http://127.0.0.1:8000/objects) pages, in there you can check the list of items or get detailed information or delete the no need items

## Testing

### For testing run the command bellow

```bash
php artisan test
```

## Report

| Task                                           | Graded time | Spent time | Comment                                   |
|------------------------------------------------|-------------|------------|-------------------------------------------|
| Init the project                               | 10 minutes  | 10 minutes | -                                         |
| Console command for log in to system           | 1 hour      | 50 minutes | Little bit easier                         |
| Second task                                    | 1.5 hour    | 2 hours    | Task was difficult for understanding      |
| Third task                                     | 1.5 hour    | 2.5 hours  | Task was very difficult for understanding |
| web CRUD for items from second and third tasks | 1 hour      | 1 hours    | -                                         |
| created tests                                  | 1 hour      | 1 hours    | -                                         |
| readme.md                                      | 15 minutes  | 15 minutes | -                                         |

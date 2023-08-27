# Bootcamp Technical Task – Back-End PHP

## What's inside

This project based on Laravel with MySQL database:

## Requirements

To run project you need PHP 8 and Laravel 10 with Apache server and SQL server

## Installation

Clone the repository

    https://github.com/YurashB/macpaw-test-task.git

Switch to the repo folder

    cd macpaw-test-task

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the seeds with test data (**Set the database connection in .env before migrating**)

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## API Endpoints

| HTTP Verbs | Endpoints                                 | Action                      |
|------------|-------------------------------------------|-----------------------------|
| GET        | /collections/                             | Return list of collections  |
| GET        | /collections/{id}                         | Return collection by id     |
| POST       | /collections/                             | Add new collection          |
| DELETE     | /collections/{id}                         | Delete collection by id     |
| PATCH      | /collections/{id}                         | Update collection by id     |
| GET        | /collections/filter/filter-by-left-amount | Return filtered collections |
| POST       | /contributors/                            | Add new contributor         |
| DELETE     | /contributors/{id}                        | Delete contributors by id   |
| PATCH      | /contributors/{id}                        | Update contributors by id   |


### Get list of Collections

#### Request

`GET /collections/`

#### Response

    [
    {
        "id": 2,
        "title": "2",
        "description": "updated",
        "target_amount": "11111.00",
        "link": "http://www.kuhn.com/minus-quod-cum-quia.html",
        "created_at": "2023-08-24 19:31:32"
    }, 
    {
        ...
    }]

### Get specific Collection by id

#### Request

`GET /collections/{id} `

#### Response

    {
    "collection": {
        "title": "Vitae cupiditate sit iste perspiciatis quia dolore veniam.",
        "description": "Sed dignissimos sed inventore harum ipsum dolor culpa vitae. Libero deleniti porro ea aut rem et qui. Similique ut provident explicabo earum accusamus. Soluta ex ut voluptatem ut quo.",
        "target_amount": "1578.50",
        "link": "http://ohara.org/ex-non-sint-est-sit-voluptatibus-quis"
    },
    "contributors": [
        {
            "0": "Lonzo Marks",
            "1": "4205.80"
        },
        {
            "0": "Mrs. Cali Hackett",
            "1": "3308.30"
        }
    ]
    }


### Add new Collection

#### Request

`POST /collections/ `

#### Body

    {
    "title" : "title",
    "target_amount" : 1111.99,
    "limk": "https://drive.google.com/file"
    }

#### Response

    true

### Delete Collection

#### Request

`DELETE /collections/{id} `

#### Response

    true

### Update Collection

#### Request

`PATCH /collections/{id} `

#### Response

    true

### Filter by amount Collection

#### Request

`GET /collections/filter/filter-by-left-amount `

#### Response

    [
    {
        "sum_amount": "9633.40",
        "id": 111,
        "target_amount": "9789.00",
        "left_amount": "155.60"
    }
    ]

### Filter by amount Collection with params

#### Request

`GET /collections/filter/filter-by-left-amount?left-amount=2000&action=bigger-than `
`GET ...action=lower-than `

#### Response

    [
    {
        "sum_amount": "2690.90",
        "id": 105,
        "target_amount": "5007.90",
        "left_amount": "2317.00"
    },
    {
        "sum_amount": "7053.00",
        "id": 85,
        "target_amount": "9521.20",
        "left_amount": "2468.20"
    }
    ]

### Add new contributor

#### Request

`POST /contributors`

#### Body

    {
    "user_name" : "user_name",
    "amount" : 1111.99,
    "collection_id": 32
    }

#### Response

    true

### Update new contributor

#### Request

`PATCH /contributors/{id}`

#### Body

    {
    "user_name" : "user_name",
    "amount" : 1111.99,
    "collection_id": 32
    }

#### Response

    true

### Update new contributor

#### Delete

`DELETE /contributors/{id}`

#### Response

    true


## Project details

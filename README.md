# Asiayo

## Database

1. SELECT orders.bnb_id, name, SUM(orders.amount) as may_amount FROM orders JOIN bnbs WHERE orders.bnb_id = bnbs.id and orders.currency='TWD' and orders.created_at between '2023-05-01' and '2023-05-31' GROUP BY orders.bnb_id ORDER BY may_amount DESC limit 10;

2. Adding foreign key for orders.bnb_id, indexes for currency and created_at, can be performed by Explain syntax, it will show the query plan for your SQL statement.

## API 

    $ make start-app
    # start app with nginx and mysql using docker compose build and docker compose up -d
    
    $ make test
    # run test cases
    # test api with POST http://127.0.0.1:8001/api/orders or GET http://127.0.0.1:8001/api/orders/A0000001?currency=TWD
    
    $ make stop
    # docker compose down to stop app, nginx, mysql
    
SOLID
1. Single Responsibility Principle
2. Dependency Inversion Principle

Design Pattern
1. Dependency Injection

## Architecure

1. please check https://docs.google.com/document/d/1tmviWPDYpQZPa3vwvXsB_1CRaP64KElU-fOBt9ryj20/edit?usp=sharing

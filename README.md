# Comment Sold Technical Assessment

## Project Overview

## Notes before viewing the application

#### CSV Data in the repo

I would not normally have csv data like this in a repo due to size concerns (I'm assuming it's all fake data), for the sake of simplicity I included it in the repo.

#### Tests

I did not have time to build a more robust laravel test suite and I did include basic tests.

I did not setup any frontend testing due to time.

## Running the application

If you do not have a sail alias use `./vendor/bin/sail` from the root directory instead of `sail`

- Clone the project
- CD into the directory
- Run `cp .env.example .env`
- In the root directory run the following
    - `sail up -d`
        - The first time you run the application it will pull down images and build the docker file, this will take a minute
    - run `sail composer i`
    - run `sail npm i`
    - run `sail artisan key:generate`
    - run `sail artisan migrate:fresh --seed`

## Using the application

Use any of the users email supplied from the data dump

For convenience, I updated the password hash to `password`

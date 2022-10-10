# Comment Sold Technical Assessment

## Notes before viewing the application

#### Time breakdown - Total 6 Hours

The time I took for each feature is not exact

Seeding the data took awhile, it was pretty slow at first so I took another stab at it to speed it up

**Database seeding** - 1 Hour 30 Minutes (Not counting this)

**Models** - 15 Minutes

**Layout** - 30 Minutes

**Products + Some more boilerplate** - 2 Hours

**Adding pages & some refactoring** - 1 Hour 30 Minutes

**Tests & Factories** - 30 Minutes

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

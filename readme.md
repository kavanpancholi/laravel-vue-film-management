## Requirements

We need to create simple web application for films. 

#### BACKEND

* Implement RESTful API to manage films

    Films should have fields:

    - Name
    - Description
    - Realease Date
    - Rating
    - Ticket Price
    - Country
    - Genre
    - Photo

    All fields are required, rating is on scale from 1 to 5, 1 film can have several genres.


#### FRONTEND 

- Create frontend page /films/ to show all films through API. 1 film per 1 page. 

- Add redirect from / to /films/

- Implement frontend page /films/film-slug-name to show specific film. URL should have film's slug.

- Implement frontend page /films/create with form to create new film. 

- Add registration and authentication

- Add possibility to post comments for each films. Fields "Name" and "Comment" are required. 

- Only registered users can post comments

###### NOTES:

- Create DB seeder with 3 films and 1 comment for every film


## Project Instructions

1. Install the project on Web Server
2. Execute `composer install`
3. Execute `cp .env.example .env`
4. Modify .env file with Database Connection and add Project's public URL as `API_URL` in env variable
5. Execute `php artisan migrate --seed`
6. Execute `npm install` or `yarn install
7. Execute `npm run dev` or `npm run production`

## Workflow

- Created new Laravel project and used Laravel Passport for the API Authentication
- Used `eloquent-sluggable` plugin for creating slugs based on Film name
- Added Migrations and Seeders for test entries
- Created Single Page Application in Vue.js for the frontend integration by using the Laravel API Endpoints
- Implemented Vue Components in order to decouple the vue element for the pages 
- Used Vue-router, axios, vue-auth, vuex in order to create the frontend application 
- Used MultiSelect, Datepicker, Vue Bootstrap plugins for a better look and feel

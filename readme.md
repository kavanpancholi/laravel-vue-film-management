## Requirements

This is a test assignment which covers RESTful API, DB, auth and form functionality in Laravel. Also you have good possibility to show your skills in JavaScript!

We need to create simple web application for films. 

1) BACKEND

1.1) Implement RESTful API to manage films

Films should have fields:

Name
Description
Realease Date
Rating
Ticket Price
Country
Genre
Photo

1.2) All fields are required, rating is on scale from 1 to 5, 1 film can have several genres.


2) FRONTEND 

2.1) create frontend page /films/ to show all films through API. 1 film per 1 page. 

2.2) add redirect from / to /films/

2.3) implement frontend page /films/film-slug-name to show specific film. URL should have film's slug.

2.4) implement frontend page /films/create with form to create new film. 

2.5) add registration and authentication

2.6) add possibility to post comments for each films. Fields "Name" and "Comment" are required. 

2.7) only registered users can post comments


3) RESULT

3.1) A new git repository should be created for the project and all changes should be committed progressively. We should be able to easily see the parts you coded and differentiate it from framework code. 
Please use Github or Bitbucket private repository to deploy your code, provide a read permission to our account ( username is gitesoftcom for both platforms) and add the repository url to your reply. 

3.2) in comment to that task provide summary of your work in English. Please, write it in formal way as if you're talking with client

3.3) stop timer when you finish your work


NOTES:

- Create DB seeder with 3 films and 1 comment for every film


## Instructions

1. Install the project on Web Server
2. Execute `composer install`
3. Execute `cp .env.example .env`
4. Modify .env file with Database Connection and add Project's public URL as `API_URL` in env variable
5. Execute `php artisan migrate --seed`
6. Execute `npm run dev` or `npm run production`

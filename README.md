# laravel framework --8.54 

#laravel/passport --10.1 (to identify and secure user's session )   https://laravel.com/docs/8.x/passport

    - I used scopes to manage user roles and permissions https://laravel.com/docs/8.x/passport#token-scopes
    
    - I generated access token with scopes based on permissions assigned to the user role
    
    - We can manage user roles and permissions via policies and gates https://laravel.com/docs/8.x/authorization 
    
#ERD for users,roles and permissions :- 

 ![image](https://user-images.githubusercontent.com/42534713/133911780-2a347cf5-5dd4-45d2-8d34-1a04df9592ff.png)

#I provided postman collection with documented apis (main directory)

    - login** ,register** ,logout **
    
    - check if user permitted to do an action **
    
    - get all permissions
    
    - create role and assign permissions to it (update ,show ,delete ,get all)
    
    - create user and assign roles to him **(update ,show , delete ,get all).
    

#installation:-
    
    - Run (cp .env.example .env )(copy .env.example content to .env new file) and config your env (databse name ,username ,password ,etc...)
    
    - Run (composer install) to install packages and dependencies
    
    - Run ( php artisan migrate) to migrate database tables
    
    -Run (php artisan passport:install --force) to generate Personal access client
    
    - Run (php artisan db:seed) to seed data to database tables
    
#login using credentials (email:admin@app.com ,password:123456 ) this seeded user with role admin with (full scopes) access token

#use token as bearer token in the header 


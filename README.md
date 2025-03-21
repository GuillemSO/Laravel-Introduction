# Technical Design

## FR1 List Actors
1. [x] Create a new route (inside group `actorout`) called `actors`.
2. [x] Create a new controller called `ActorController`.
3. [x] Modify view `welcome` to add a hyperlink to route `actors`.
4. [x] Create a list view in `views/actors` folder.
5. [x] Define function `listActors` to get data and return it as a list view.

## FR2 List Actors by Decade
1. [] Create a new route (inside group `actorout`) called `listActorsByDecade`.
2. [] Include middleware `year` to validate routes with a given year.
3. [] Modify view `welcome` to add a form with a dropdown and proper route.
4. [] Define function `listActorsByDecade/{year}` to get data where birthdate  
   is between selected years. Return results as a list view.

## FR3 Count Actors
1. [x] Create a new route (inside group `actorout`) called `countActors`.
2. [x] Modify view `welcome` to add a hyperlink to route `countActors`.
3. [x] Create a count view in `views/actors` folder.
4. [x] Define function `countActors` to get the total number of actors in the database.  
   Return as a count view.

## FR4 Delete Actor
1. [] Create a new route as `actors/{id}`.
2. [] Define function `destroy` to remove an actor from the database by ID.  
   Return JSON with fields:
   ```json
   {
     "action": "delete",
     "status": true|false
   }


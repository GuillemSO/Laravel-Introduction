# **Analysis**

## **1. Routes**
- **1.1.** What are they and their purpose?  
- **1.2.** Where are they defined?  
- **1.3.** How many are there?  
- **1.4.** How do they group?  
- **1.5.** Which prefix do they use?  
- **1.6.** Which parameters do they use?  

## **2. Middleware**
- **2.1.** What are they and their purpose?  
- **2.2.** Where are they defined?  
- **2.3.** How many are there?  
- **2.4.** Which parameters do they use?  
- **2.5.** When are they invoked?  

## **3. Data**
- **3.1.** Where are they defined?  
- **3.2.** How are they read?  

## **4. Controller**
- **4.1.** What are they and their purpose?  
- **4.2.** Where are they defined?  
- **4.3.** How many are there?  

## **5. View**
- **5.1.** What are they and their purpose?  
- **5.2.** Where are they defined?  
- **5.3.** How many are there?  

---

## **Implementation Enhancements Opened as Issues**
For more details, check out the [issues here](https://github.com/Stucom-Pelai/M07_UF2_Laravel/issues).

















# Technical Design

## FR1 List Actors
1. Create a new route (inside group `actorout`) called `actors`.
2. Create a new controller called `ActorController`.
3. Modify view `welcome` to add a hyperlink to route `actors`.
4. Create a list view in `views/actors` folder.
5. Define function `listActors` to get data and return it as a list view.

## FR2 List Actors by Decade
1. Create a new route (inside group `actorout`) called `listActorsByDecade`.
2. Include middleware `year` to validate routes with a given year.
3. Modify view `welcome` to add a form with a dropdown and proper route.
4. Define function `listActorsByDecade/{year}` to get data where birthdate  
   is between selected years. Return results as a list view.

## FR3 Count Actors
1. Create a new route (inside group `actorout`) called `countActors`.
2. Modify view `welcome` to add a hyperlink to route `countActors`.
3. Create a count view in `views/actors` folder.
4. Define function `countActors` to get the total number of actors in the database.  
   Return as a count view.

## FR4 Delete Actor
1. Create a new route as `actors/{id}`.
2. Define function `destroy` to remove an actor from the database by ID.  
   Return JSON with fields:
   ```json
   {
     "action": "delete",
     "status": true|false
   }


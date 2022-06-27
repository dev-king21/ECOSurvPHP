## Notes - Eco Serv

Part 1 
    - I was unsure if I needed to store all the retrieved API data in the DB.  
    - I wasn't sure how to deal with sub-breeds.  I created a related table to deal with them.
    - I created an image table and related it to breeds but I'm not sure this is the best approach. Currently, when hitting the endpoint /breed we save all breeds, sub-breeds and images to the DB.  As you can imagine this takes a while.  My first approach was to just return the images on-the-fly when queried but this didn't work with the GraphQL query in Part 3.  (   Commenting line 64 in BreedController.php will make the sofware run a lot faster.  $this->addImages($model_breed);  )  

Part 2
    - I think all the models and relationships are set up correctly.  
    - I was a little unsure of where to place various methods -  some tidying and refactoring would make this section better.  
    - I ran out of time for delete - currently, if the DogsAPI deletes items they will remain in the Eco Serv's DB.  I was thinking about comparing each /breed call data to what was in the DB and deleting any additional items.  However, this would lead to problems of it's own if users wanted to manipulated data directly.  
    - I have not used Redis before but have initialised it and sored the API data in it.  
    
Park 3
    - I wasn't sure of exactly how to set up GraphQL so I used a plugin - Lighthouse.  It was relatively straightforward and all queries work.

Generally
    - I really enjoyed working on the task.  If I had a bit more time I think I could have polished it and got the remaining parts working.  I was very rusty as I hadn't looked at PHP for a few years so I took quite some time to read up and implement the solution.   



## Subscription Platform
****

**This is a simple subscription platform where users can subscribe to a site and 
receive email notification whenever the website publishes a new post**

To get the service running, clone or deploy the project making sure the keys for 
the database and the mail service are properly set.

You can get testing data by running the command:

``php artisan db:seed``
This command will populate the database table with websites data that can be
used to test the service

1. Post Creation

To create a post , make a `POST` request to `/api/v1/posts` , by specifying the required
data to store the post

2. Subscribe to a site
To subscribe to a site, make a `POST` request to `/api/v1/websites/{websiteId}/subscribe`, and 
specify the `id` of the user subscribing to the website in the request data.

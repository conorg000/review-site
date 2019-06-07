<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Web Application Development - Final Assignment Documentation</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>Conor Gould s5007332</h2>
      <h2>Overview</h2>
      <p>The goal of the assignment was to produce a simple "review" web application. We were tasked with building on our last assignment, 
      making use of the new techniques we learned in class, such as model/controller, user authentication, image handling and eloquent queries.</p>
      <p>My review application is for mobile phones and it's intended to be a platform where people can review and critique mobile phones. Users
      can find a phone and then leave a review, along with a rating out of 5. Users can also add new products for other people to review. There are rankings which
      list items by their average rating and by their number of reviews. Moderator-users have the ability to add/edit/delete items. They can also edit reviews.
      Other users can only edit/delete their own reviews and photos. Guests can see products and reviews, but that's all.</p>
      <h2>Database</h2>
      <p><img src="https://i.postimg.cc/52VmTFrs/webapp.jpg"></p>
      <p>The database had several aspects, and ended up being much more complex than in the first assignment. The tables in the database include: 
      Product, User, Manufacturer, Picture, Review, Like, Follow. To summarise, a user can review a product and/or post photos of the product. A user can 
      also like/dislike a review. Users can also follow each other. A product is made by a manufacturer. As demonstrated in the diagram above, there are 
      several many-to-many relationships represented in the database. Accessing the appropriate data involved using eloquent queries, specifying that some tables 
      had many-to-many relationships. The User table has a many-to-many relationship with itself, as a user can follow many users, and a user can be followed by many users.
      Migration techniques were couple with seeding to preload the tables with default data - making testing a lot easier. It was important to have enough volume and variation
      in the artificial data to test things thoroughly.</p>
      <h2>Authentication</h2>
      <p>Authentication was a recent addition to our Laravel toolkit. For the most part, it felt like Laravel was doing the work for me. I seeded some users with passwords,
       but log-in and registration was all handled automatically by Laravel. At times, it was difficult to get the logout function to redirect appropriately. Ideally, I 
       wanted it to take the user to the page they were on before logging out, but Laravel had it hard-coded to go back to the home page. With some help from Stack Overflow
       I found a way to override this function, and pass it the last url instead.</p>
      <p>It was interesting enforcing access control at both the front and back end. At the front end, it was pretty easy to use if-else statements in Blade, checking
      if the person is logged in or not, and showing the appropriate HTML. This also makes the app feel quite professional and responsive. On the back end, it was also quite 
      straightforward. By defining what sort of middleware was attached to which functions in the controller, certain parts of the site were unlocked/locked according
      to who was logged in.</p>
      <h2>CRUD</h2>
      <p>The main challenge with CRUD in this assignment, was granting the correct permissions for different types of users. All up there were 3 different sets of permissions: 
      guest, regular user, and moderator. Moderators can edit/delete/create anything, while guests can only look at things. Regular users can edit and delete their own contributions
       to the site, but not touch anyone else's. As described above, this involved a mix of if-else statements on the front-end, and a lot of reference to middleware functions
        on the backend.
      </p>
      <h2>Obstacles</h2>
      <p>I encountered a few issues when tackling this assignment. Firstly, it took me a while to fully understand when and how to implement many-to-many relationships 
      and then call the right data. So when I set up my system of upvoting and downvoting reviews, I didn't use an ideal method. While I did have a M-to-M relationship,
      my mistake lay in the fact that I brought in new fields to the review database (upvotes count and downvote count). To change these fields, I used functions in the web 
      route. While this works, it introduced some data redundnacy. Looking back on it, I should have avoided making new data fields in the reviews table, and instead just
      used a "count" query from eloquent to retrieve the right data from the "likes" table.</p>
      <p>The other issue I had involved the follow/unfollow capacity. While I managed to introduce the follow function quite easily, the unfollow function never ended up working.
      In the "follow" controller, I wanted to use the destroy function as a way of "unfollowing", but the destroy function needs to be passed the id of the data entry to be deleted.
      This is where problems started appearing. I had a form for users to enter information about who they wanted to unfollow. My plan was to use this info in a query and
      retrieve the id of the data entry, then pass that to the destroy/unfollow function. However, I could never get my routes in web.php to successfully communicate with
      the functions in the "follow" controller.</p>
      <h2>Recommendation</h2>
      <p>The recommendation feature that I implemented helps users find other users that they might want to follow. I took a simple approach to what could end up 
      being a very complicated exercise, if implemented properly. Here's how the algorithm works.
      For the logged-in user, the algorithm finds the users that they are currently following. It then loops through these users, looking at the people that they're following. 
      As it does this, it compares the users with the logged-in user's "follow list". When it finds someone that the logged-in user isn't following, it adds the user to 
      an array of "suggested" users. These users are displayed on the home page for the logged-in user. The idea is that a user would be interested in the people that their
      "friends" are interested in. The weakness of this method is that a new user has no suggested people to follow, because they aren't already following anyone. One way
      to fix this would be to suggest following the most active reviewers.</p>
      <h2>Templating</h2>
      <p>The assignment made full use of Blade's templating abilities. A 'master' layout was setup, containing Bootstrap's CSS and a Laravel Navbar - designed for user authentication. All the other pages extended 
      on that layout. Using Bootstrap's grid system, appropriate column sizes where selected.</p><br><br><br>
    </div>
  </div>

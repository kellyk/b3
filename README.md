PHP Router

#Configuration
Until I work out some hiccups with the router, please go to includes/constants.php
and SITE_ROOT and SITE_ROOT_PUBLIC variables with the appropriate URLs for your project.

#Organization
All requests are routed through index.php.
Index.php immediately calls on the router, which breaks up the URL to determine what
content to serve. The first portion of the url (after index.php) is the controller.
The second portion is the method. Please see the next paragraph for more information.

#Adding Views:

##Start with a Controller
To add new pages, you need to use an existing controller or create a new one.
A page is accessed by hitting the base url, index.php, followed by a controller name,
followed optionally by a method name.

For Example:

www.site.com/users/add

The above URL would access the users controller and execute its add() method.
If no method is included (i.e. www.site.com/users), then the index() method will be called.

##Create a View and Add Your HTML
Each method is used to load a view from the views directory. Therefore, to add your html,
simply create a file in the views folder, and call on it from your controller method.

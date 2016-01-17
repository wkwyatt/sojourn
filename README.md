# Sojourn
Practice creating a custom content management system and API for an existing website using PHP and MySQL

## Summary
Full CRUD(create, read, update, delete) functionality.  Created the ability for a non technical user to make changes to the displayed content of the website through the database. 

## Existing Features
* Create new post
* View existing data on page that is stored in the database
* Update or change existing data in the database
* Delete information in the database

## Screenshots
![](https://github.com/wkwyatt/sojourn/blob/gh-readme/gh-images/home.png)
![](https://github.com/wkwyatt/sojourn/blob/gh-readme/gh-images/login.png)
![](https://github.com/wkwyatt/sojourn/blob/gh-readme/gh-images/update.png)

## Code
Using an accordion menu I make calls to the custom API in order to complete crud task.  Also I make a sql query to grab the existing sections headers and content within those sections.
```html
<form action="http://local-sojourn.com/admin/admin_api.php" method="post">
<div class="row">
<div>
<select id="section" class="form-control dropdown" name="section">
<?php
foreach($rows as $row){
print '<option value="'.$row['section'].'">'.$row['section'].'</option>';
}
?>				
...
</form>
```
## Next Step
* Convert custom CMS to Drupal

## Links
Make sure to link to jquery and bootstrap
* [JQuery](https://developers.google.com/speed/libraries/)
	* https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js
* [Bootstrap](https://www.bootstrapcdn.com/)
	* https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css

## Collaborators
[Chance Rhodes](https://github.com/chancer4)
![](https://avatars3.githubusercontent.com/u/15091296?v=3&s=192)

[Stuart Tiedemann](https://github.com/stuarttiedemann)
![](https://avatars0.githubusercontent.com/u/13318872?v=3&s=192)



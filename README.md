# Artwork-System
CS312 Web App Assessment


Implement a full web system to support Cara with handling painting orders.

Implement the following:

A home page for Cara Art that includes a brief description of her and her art with navigation to an art listing page, a track&trace booking page (just a simple placeholder page for simple 50% base) and an admin page for Cara.
An art database table that contains the name, date of completion, width (mm), height (mm), price (£) and a textual description of each piece of art along with an ID.
A database driven art listing page, by default listart.php, that:
Lists the current art in the database in an HTML table;
Has an order button on each row of the table that takes the user to a form for the user to place an order - the order form should include fields for name, phone-number, email, postal-address and should show the name and ID of the selected painting from the table. 
An orders database table to store orders with code to add orders in response to the above form;
An admin page for Cara to view the list of orders and add details of new paintings  - this should be linked to from the homepage and be password protected with a fixed password caraART21 and may be a single page or a set of pages.
Pages should pass HTML5 validation tests with all images having suitable alt-tags. 

# (WEB-VANILLA) Simple 2 page website

Our client just accepted our tool and pushed forward with the project. YAAY! She now wants to give early access to the artists to upload artwork before the application goes live in order to have sellable products when the big launch is scheduled. 

One page to upload image: image file, image title, description, email, price, camera specs, photographer name, capture date, tags
Image data and files to be stored in a media directory
One post-update page with success message displaying saved data and image thumbnail

The early access application will consist of a simple web page with a form that contains the following fields:
Image title
Image description
Artist email
Artist name
Camera specs
Price
Capture date
Tags (select multiple)

Submitting the above described form will redirect you to a success page that will display the received information. Since we do not know about databases yet, we will store the information in files on a folder based structure where each user will have a folder whose name will be based on the user’s personal details (hash it, don’t use personal details as such, GDPR!).

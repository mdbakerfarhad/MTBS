
# (MTBS) - Movie Ticket Booking System

The Online Movie Ticket Booking System is a web-based platform designed to simplify the process of purchasing movie tickets online. In today's fast-paced world, people seek convenience and efficiency in their daily tasks, and the entertainment industry is no exception. This system provides users with the ability to browse through available movies, access detailed information about each movie, view showtimes, select seats, and securely purchase tickets without the hassle of visiting a physical theater or box office. The Online Movie Ticket Booking System aims to provide a seamless and user-friendly experience for movie enthusiasts, allowing them to browse, book, and enjoy movies with utmost convenience. This project addresses the demands of modern moviegoers by offering a technologically advanced solution that enhances their entertainment experience and simplifies the process of purchasing tickets for the latest cinematic releases. 
## Deployment

To deploy this project run

```bash
  git clone https://github.com/ArafatAkashAkku/CSE482-Section02-Summer2023-NQH-Movie-Ticket-Booking-System.git
```
  or
  
```bash
  git clone https://github.com/ArafatAkashAkku/CSE482-Section02-Summer2023-NQH-Movie-Ticket-Booking-System.git MTBS
```

Always rename the folder as 'MTBS' after downloading or cloning.

You have to download XAMPP. If you have already downloaded then just cut and paste the whole 'MTBS' folder in your 
```bash
(default structure): Local Disk(c:) --> XAMPP --> htdocs 
```
After the that you have to open xampp and start both Apache and MySQL.

Go to your brower and write 
```bash
  localhost/phpmyadmin/
```
Create a new database named 'movie'. You can do this manually or by writing this code in sql tab
```bash
  CREATE DATABASE `movie`;
```
Then click on the movie database and select import. There you can see to upload a sql file and the sql file of our database is given in the 'MTBS' folder that you downloaded earlier.

After following all the steps you can finally run the project just go to your browser and write

For home page
```bash
  localhost/MTBS/
```


For admin page
```bash
  localhost/MTBS/admin/
```
You can sign up and verification link will be given in your email address that you choose for signing up. 

Admin log in details
```bash
Email: admin@xyz.com
Password: 1
```

For payment gateway we have used stripe. The Card details are give below:
```bash
 CVV - any 3 digit number
 Expiry date - any month and year from the current month and year
 Visa(debit) Card 4000056655665556
 Mastercard 5555555555554444
 Mastercard (debit) 5200828282828210
 American Express 378282246310005
 Discover 6011111111111117
```

Our website is also hosted on https://www.000webhost.com/  

Live Website link: https://movieticketbookingsystem1.000webhostapp.com/
## Special Features

1. PWA (Progressive Web Application which means you can install our app on any kind of devices)

2. Fully Responsive Application (Cross Platform Website)

3. Email Verification Process (Login, Signup, Forgetpassword, Updatepassword)

4. Live Movie Search Suggestions

5. Online Payment System

6. Movie Review Writing System

7. Movie Filter Search System

8. SEO Friendly Urls (remove php extensions in urls)


## Lighthouse Chrome Devtools Analyze Report (Desktop )

1. Performance: 69%
       
       1. First Contentful Paint: 1.4s
       2. Largest Contentful Paint: 4.2s
       3. Total Blocking Time: 10ms
       4. Cumulative Layout Shift: 0
       5. Speed Index: 2.4s
2. Accessibility: 94%
3. Best Practice: 86%
4. SEO: 100%
5. PWA: Installable
## Screenshots

Final Output Result on browser 

For home page
![User Page](https://github.com/ArafatAkashAkku/CSE482-Section02-Summer2023-NQH-Movie-Ticket-Booking-System/assets/114158075/1710e3b9-0c74-41ec-b120-595cdf3ce7bd)


For admin page
![Admin Page](https://github.com/ArafatAkashAkku/CSE482-Section02-Summer2023-NQH-Movie-Ticket-Booking-System/assets/114158075/5f4b4480-974b-4624-a66d-4e1cfb23de87)

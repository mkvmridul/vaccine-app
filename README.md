# A vaccine testing tool

__A tool to measure the effectiveness of a vaccine by giving half people a palcebo and the other half a real vaccine __

Here we calculate the efficacy rate of the vaccine by the given formula

__efficacy rate__ = (no_of_placebo_infected - no_of_vaccinated_infected)/no_of_placebo_infected

*How to perform the testing?*

Half of the registered volunteers will receive the vaccine, the other half will receive the placebo (a substance or treatment which is designed to have no therapeutic value). However, neither the volunteers nor the vaccine maker knows whether it is a vaccine or placebo. The spray is only labelled as either “A” or “B” , and it could be single dose or half dose. After logged in, a volunteer can scan the QR code printed on nasal spray packaging to autofill these two text fields: 
• Vaccine Group * (A or B) 
• Dose * (0.5 or 1) 

*Below is the given 4 possible combinations for the given doses*

(./screenshots/qr.png)

now the given qr code will be scanned by the camera

__NOTE:__ Here neither the volunteer know nor the vaccine provider know to whom what is given. Thus we are scanning the qr code.

(./screenshots/instascan.png)

Above we are scanning the qr code using the instascan.js library

  [
let scanner = new Instascan.Scanner({ video: document.getElementById("preview") });
      scanner.addListener("scan", function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error("No cameras found.");
        }
      }).catch(function (e) {
        console.error(e);
      });
  ]

Other pages are given below

(./screenshots/profile.png)
(./screenshots/admin.png)
(./screenshots/signup.png)

-----------------------------------------------------

*Configuration*

1.  Run command,
    composer install

2.  .env file (DB Configuration)
    open env file and set database on DB_DATABASE and username on DB_USERNAME
3.  Run command to clean old cache,
    php artisan config:cache

4.  After saving information in .env then run a command on root directory.
    php artisan serve # run app

5.  Open Browser and type localhost:8000
      

 ----------------------------------------

      Admin Credentials

email vaccine@admin.com
password covid19@vaccine


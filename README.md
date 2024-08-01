# aa-project02
Simple login app that pulls data from a DynamoDB table. Uses Terraform to set up the database and Docker to package the app.

What to note down:

Collaborations
This is a hand-on cloud engineering project delivered by the azubi africa cloud team in 2024. After 6 months of AWS cloud training, we got a chance to work on some realife cloud projects. I was able to work with:

William Mukoyani @their_linkedin
Esther Awudu @their_linkedin
Thelma Laryea @their_linkedin
Sampson Boamah @their_linkedin

Project Overview
 Technologies Used: 
 Git and Github
 AWS DynamoDB
 AWS EC2
 Terraform
 Docker
 HTML, CSS, Javascript and PHP

 Tasks:
1. Manually create a DynamoDB table to collect Email, Name and Country
2. Link the DynamoDB table to webpage using AWS SDK for PHP
3. Use terraform to create DynamoDB table
4. 
   1. Creating an s3 bucket through the AWS console
You need to have a an AWS account, you can get a freetire account which basically means you get a free 1 year to use some AWS resources. In our case, we have that setup and we will be using the s3 service.

Go to the s3 service
click on "create bucket" : a bucket is where we will put our files.
click on "objects" : obejects are files that can go into the bucket.
   2. Setup Website hosting for S3
Webhosting is what allows o a webfile to be served to the internet. AWS offers a free option to host a static website (static is something that doesnt use data from a database).

Go to your s3 bucket
Go to the properties tab
Scroll down to Static Web Hosting and enable this.
   3. Launch your website on s3
We have a bucket and its now hosting ready, all we need to do is add our files and we can access the site.

Go to your s3 bucket and upload "objects". these are your webfiles from your computer
Go to the s3 bucket properties tab
Scroll down to Static Web Hosting and you should now see a url. *click on the url and access your site.
Showcase a simple Architecture diagram
Logo

(back to top)

Getting Started
This is an example of how you may give instructions on setting up your project locally. To get a local copy up and running follow these simple example steps.

Installation
Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services.

Clone the repo
git clone https://github.com/your_username_/Project-Name.git
(back to top)

Contact
Your Name - @my_twitter - email@example.com

Project Link: https://github.com/your_username/repo_name

(back to top)

References
Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

GitHub Emoji Cheat Sheet
Malven's Flexbox Cheatsheet
Malven's Grid Cheatsheet
Img Shields
GitHub Pages


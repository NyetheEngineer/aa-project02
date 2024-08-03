## About The Project

Simple web application utilizing dynamic data display from Amazon DynamoDB, infrastructure as code with Terraform, and containerization with Docker. This project demonstrates the integration of these technologies for user authentication, data storage, and infrastructure management.

### Collaborations

I worked on this project with insightful contribution from the Cloud Navigators Team.

1. Dzandu Ransford Selorm - dzandu.selorm@azubiafrica.org
2. Jermin Amarteifio - jermin.amarteifio@azubiafrica.org
3. Alfred Mensah - alfred.mensah@azubiafrica.org
4. Ernest Kwabena Ofori Thompson - ernest.thompson@azubiafrica.org
5. Allan Loyatun - allan.loyatum@azubiafrica.org
6. Jully Achenchi - jully.achenchi@azubiafrica.org
7. Selma Anya - selma.anya@azubiafrica.org
8. Caesar Morris - caesar.morris@azubiafrica.org

## Technologies and tools used

- Git and GitHub
- PHP
- AWS Dynamo DB
- Terraform
- Docker and DockHub
- AWS CLI

## Project Overview
1. Create manual DynamoDB table
2. Link the DynamoDB table to webpage
3. Using IAC with Terraform to create DynamoDB table
4. Containerise with Docker and push to container repository (DockerHub)

## Prerequisites
1. PHP development environment (e.g XAMPP, MAMP)
2. AWS Account with IAM credentials
3. Docker installed and running

## Project Files
```
.
├── app/                # application code
│   ├── login.php       # Retrieve the values of the "username" and "password" fields from the form submission
|   ├── style.css       # stylesheet
│   ├── index.html      # Login page
│   └── guestlist.php   # Fetch request from DB
├── composer.json       # Package manager for PHP
├── Dockerfile          # Dockerfile for building the application image
├── README.md           # This file (documentation)
├── vendor/             # AWS SDK for PHP application dependencies
└── terraform/          # Terraform configuration files
    ├── main.tf         # DynamoDB table definition
    ├── locals.tf       # Decodes json_data into a Terraform data structure
    ├── data.json       # DB items saved in json format
```
## Setting Up

1. Configure AWS Credentials:

   - Create an IAM user with appropriate permissions for DynamoDB access.
   - Store the AWS access key and secret key securely (e.g., environment variables).

2. Install Terraform:

   - Windows: Download and install the Terraform installer from the official website (https://www.terraform.io/downloads).

3. Install Application Dependencies:

   - Navigate to the app directory.
   - Install Composer (https://getcomposer.org/).

4. Working with AWS SDK for PHP:

    - Install the AWS SDK for PHP using Composer:
      ``` 
      composer require aws/aws-sdk-php
      ```
   Once the AWS SDK for PHP is installed, use it in your PHP code by including the Composer-generated autoloader: 

      ```text
      require 'vendor/autoload.php';
      ```

## Using Terraform for DynamoDB Provisioning
(Complete these steps after installing Terraform):

1. Configure AWS Credentials
   - Prerequisites: An AWS account with appropriate permissions.
Establish local access to your AWS account by configuring the AWS CLI using the aws configure command.
Refer to the official AWS documentation for detailed instructions: https://docs.aws.amazon.com/cli/latest/userguide/cli-chap-configure.html

2. Create Terraform Project Directory
Create a dedicated directory on your local machine to store your Terraform configuration files for this project.

3. Define the AWS Provider (main.tf)
Create a file named ```text main.tf``` within your Terraform directory. This file will define the AWS provider, specifying the AWS region and credentials Terraform will use.

```
Terraform
# Configure Terraform AWS Provider
provider "aws" {
  region = "us-east-1"
}
```

4. Define DynamoDB Table (main.tf)
Within the same ```text main.tf file```, define the configuration for your DynamoDB table.

```text
Terraform
resource "aws_dynamodb_table" "GuestBook" {
  name           = "GuestBook"
  hash_key       = "Email" # Define your hash key attribute
  read_capacity  = 10
  write_capacity = 10

  attribute {
    name = "Email" # Define hash key attribute details
    type = "S"  # Specify attribute data type (String in this case)
  }

  # ... Define additional attributes and settings as needed...
resource "aws_dynamodb_table_item" "dynamodb_schema_table_item" {
  for_each = local.tf_data
  table_name = aws_dynamodb_table.GuestBook.name
  hash_key   = "Email"
  item = jsonencode(each.value)
} 
```

5. Loading JSON Data into Terraform

   - Create a file named ```text data.json``` within your Terraform directory. Include some data in the format shown:
   ```
        {
   	"item1": {
   		"Email": {
   			"S": "nyemitei.odjidja@azubiafrica.org"
   		},
   		"Name": {
   			"S": "Nyemitei Odjidja"
   		},
   		"Gender": {
   			"S": "male"
   		},
   		"Country": {
   			"S": "Ghana"
   		}
   	},
   	"Item2": {
   		"Email": {
   			"S": "jermin.amarteifio@azubiafrica.org"
   		},
   		"Name": {
   			"S": "Jermin Amarteifio"
   		},
   		"Gender": {
   			"S": "male"
   		},
   		"Country": {
   			"S": "Ghana"
   		}
   	}
   }
``
   - Create a file named ```locals.tf``` within your Terraform directory. It will read and decode the JSON data saved in ```data.json``` into Terraform data structure.
     ```
        locals {
        json_data = file("./data.json")
        tf_data   = jsondecode(local.json_data)
         }
     ```
     

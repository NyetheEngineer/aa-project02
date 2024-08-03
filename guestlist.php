<!DOCTYPE html> 

<html> 
<head>
  <meta charset="utf-8">
  <title>Azubi Africa: List</title>
  <link rel="stylesheet" type="text/css" href="_style.css">
</head>

<body style="width:100%;overflow:hidden"> 


<div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
  <h1><a href="#" rel="dofollow">Guest List</a></h1>
  <button style="position:absolute;right:3rem;padding:.3rem"><a href="logout.php" rel="dofollow" style="color:red">Log out</a></button>
</div>

<!-- how we display our content -->

 <?php
        require 'vendor/autoload.php';

        use Aws\DynamoDb\DynamoDbClient;
        use Aws\Exception\AwsException;

        // $awsAccessKeyId = getenv('AWS_ACCESS_KEY_ID');
        // $awsSecretAccessKey = getenv('AWS_SECRET_ACCESS_KEY');

        // Create a DynamoDB client
        $dynamoDb = new DynamoDbClient([
            'region'      => 'us-east-1',
            'version'     => 'latest',
            'credentials' => [
                'key'    => '',
                'secret' => '',
            ]
        ]);

        // Retrieve items from the DynamoDB table
        $tableName = 'GuestBook';

        try {
            $result = $dynamoDb->scan([
                'TableName' => $tableName,
            ]);

            foreach ($result['Items'] as $item) {
                $name = isset($item['Name']['S']) ? $item['Name']['S'] : '';
                $email = isset($item['Email']['S']) ? $item['Email']['S'] : '';
                $country = isset($item['Country']['S']) ? $item['Country']['S'] : '';

                echo '<div class="guest">';
                echo '<p class="name">Name: ' . htmlspecialchars($name) . '</p>';
                echo '<p class="email">Email: ' . htmlspecialchars($email) . '</p>';
                echo '<p class="country">Country: ' . htmlspecialchars($country) . '</p>';
                echo '</div>';
            }
        } catch (AwsException $e) {
            echo '<p>Error retrieving data: ' . $e->getMessage() . '</p>';
        }
        ?>
  </tbody>
</table>

<!-- styles for our table .... dont tamper -->
<style>
  .styled-table {
    border-collapse: collapse;
    margin: 25px 20%;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  .styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
  }
  .styled-table th,
  .styled-table td {
    padding: 12px 15px;
  }
  .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }

  .styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }

  .styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }
</style>


<div class="padding-top--64">
  <div class="loginbackground-gridContainer">
    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
      <div class="box-root" >
      </div>
    </div>
    <div class="box-root flex-flex" style="grid-area: 2 /

omar hany mohamed  20192186 

<?php
// Define the API URL
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the data using file_get_contents
$response = file_get_contents($url);

// Check if the response was successful
if ($response === FALSE) {
    die('Error occurred while fetching data.');
}

// Decode the JSON response
$result = json_decode($response, true);

// Check if decoding was successful
if ($result === NULL) {
    die('Error occurred while decoding JSON.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Bahrain Students Enrollment</title>
    <link rel="stylesheet" href="https://unpkg.com/pico.css">
    <style>
        /* Additional custom styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f0f0f0;
        }
        .table-container {
            overflow: auto; /* Handle overflow */
            max-width: 100%; /* Make it responsive */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>University of Bahrain Students Enrollment by Nationality</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>College</th>
                    <th>Program</th>
                    <th>Nationality</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the retrieved data in the table
                foreach ($result['results'] as $record) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($record['year']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['semester']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['colleges']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['the_programs']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['nationality']) . "</td>";
                    echo "<td>" . htmlspecialchars($record['number_of_students']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

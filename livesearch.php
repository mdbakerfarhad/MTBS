<?php
// Include the database configuration file.
require_once 'config.php';
include 'dbConnect.php';
// Retrieve the value of the "search" variable from "script.js".
if (isset($_POST['search'])) {
    // Assign the search box value to the $Name variable.
    $Name = $_POST['search'];
    // Define the search query.
    $Query = "SELECT Name,Id FROM all_movie_info WHERE Name LIKE '%$Name%' LIMIT 5";
    // Execute the query.
    $ExecQuery = MySQLi_query($con, $Query);
    // Create an unordered list to display the results.
    echo '
<ul style="display:flex;flex-direction:column;gap:10px;">
   ';
    // Fetch the results from the database.
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        if ($Result) {
?>
            <!-- Create list items.
        Call the JavaScript function named "fill" found in "script.js".
        Pass the fetched result as a parameter. -->

            <li onclick='fill("<?php echo $Result['Name']; ?>")'>
                <a style="cursor:pointer; text-decoration:none;color:black;" href="search_result?search=<?php echo $Result['Name']; ?>">
                    <!-- Display the searched result in the search box of "search.php". -->
                    <?php echo $Result['Name']; ?>
            </li></a>
            <!-- The following PHP code is only for closing parentheses. Do not be confused. -->
        <?php
        } else {
        ?>
            <li>
                <a">
                    <!-- Display the searched result in the search box of "search.php". -->
                    <?php "No result"; ?>
            </li></a>
<?php
        }
    }
}
?>
</ul>
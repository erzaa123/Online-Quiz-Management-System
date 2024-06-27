<?php
include_once('connection_ashensori.php');

$directorId = isset($_GET['DirectorId']) ? $_GET['DirectorId'] : '';

$query = "SELECT * FROM movies";
if ($directorId !== '') {
    $query .= " WHERE DirectorId = '$directorId'";
}

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['MovieId']}</td>
            <td>{$row['Title']}</td>
            <td>{$row['ReleaseYear']}</td>
            <td>{$row['DirectorId']}</td>
            <td>
                <a href='#edit_{$row['MovieId']}' class='btn btn-success btn-sm' data-toggle='modal'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </a>
                <a href='delete_movie.php?MovieId={$row['MovieId']}' class='btn btn-danger btn-sm' onclick='return confirmDelete()'>
                    <span class='glyphicon glyphicon-trash'></span> Delete
                </a>
            </td>
          </tr>";
}
?>

<?php
    include "../connect/connect.php";

    $commentPass = $_POST['pass'];
    $commentID = $_POST["commentID"];

    $sql = "DELETE FROM mycomment WHERE CommentID = {$commentID}";
    $result = $connect -> query($sql);

    echo json_encode(array("info" => $sql));


?>
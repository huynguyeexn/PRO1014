<<<<<<< HEAD
<?php

function getTagId($id){
    $sql = "SELECT * FROM tag WHERE id = $id;";
    return queryOne($sql);
}
=======
<?php 

function getAllTag(){
    $sql = "select * from tag_product";
    return query($sql);
}
>>>>>>> 0bdd3a729cfb05ee80fc828da9d6e83f1d160aac

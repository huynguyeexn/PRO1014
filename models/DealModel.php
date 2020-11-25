<?php
function getAllDeal(){
    $sql = "select * from deal";
    return query($sql);
}

function getDealId($id){
    $sql = "SELECT * FROM deal_detail WHERE deal_id = $id;";
    return queryOne($sql);
}
function getAllDealDetailById($id){
    $sql = "SELECT * FROM deal_detail WHERE deal_id = $id;";
    return query($sql);
}
?>
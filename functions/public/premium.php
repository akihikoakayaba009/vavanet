<?php 
function listar_planos_premium(){
    global $pdo;
    $res = array();
    $v = $pdo->prepare("SELECT * FROM planos_premium WHERE plano_status = 1 ORDER BY premium_preco * 1 ASC");
    $v->execute();
    if($v->rowCount() > 0){
        $res = $v->fetchAll();
    }
    return $res;
}

function get_plano_premium_por_id($premium_id){
    global $pdo;
    $v = $pdo->prepare("SELECT * FROM planos_premium WHERE plano_status = 1 AND premium_id = (:premium_id) LIMIT 1");
    $v->bindValue(":premium_id", $premium_id);
    $v->execute();
    return $v->fetch();
}
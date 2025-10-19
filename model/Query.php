<?php

namespace model;

class Operatore{

    const LOGIN = "SELECT * FROM operatori_sito_vineria WHERE nickname=md5(?) AND password=md5(?)";

}

class Profilo{
    const LOGIN = "SELECT * FROM profili WHERE username=? AND password=md5(?)";
}

class Prodotto{
    const INSERT = "INSERT INTO prodotti (nome,prezzo,descrizione,sconto,scorte) values (?,?,?,?,?)";
    const READALL = "SELECT * FROM prodotti";
    
}

class Carrello{
    const INSERT = "INSERT INTO carrello (id_prodotto,id_profilo,qta) values (?,?,?)";
    const READALL = "SELECT * FROM carrello"; //DEVE DIVENTARE SELECT MY CART CON INNER JOIN
    const READALLWHERE = "SELECT * FROM carrello WHERE id_profilo=?";
    const READALLPRODUCT = "SELECT * FROM carrello WHERE id_prodotto=?";
    const SELECT_MY_CART = "SELECT id_item_carrello,nome,prezzo,qta, (qta*prezzo) as 'costo_complessivo' 
                            FROM carrello INNER JOIN prodotti ON carrello.id_prodotto=prodotti.id WHERE id_profilo = ?";
    const UPDATESINGLECARRELLO = "UPDATE carrello SET id_prodotto=?, id_profilo=?, qta=? WHERE id_profilo=? AND id_prodotto=?";
    const DELETESINGLE = "DELETE FROM carrello WHERE id_item_carrello=?";
    const DELETECART = "DELETE FROM carrello WHERE id_profilo=?";

}

class Recensione{
    const INSERT = "INSERT INTO recensioni (nickname,messaggio) values (?,?)";
    const READALL = "SELECT * FROM recensioni";
    const READALLWHERE = "SELECT * FROM recensioni WHERE stato=?";
    const UPDATESINGLE = "UPDATE recensioni SET stato=? WHERE id=?";
    const DELETESINGLE = "DELETE FROM recensioni WHERE id=?";
}

class ElementoHtml {
    const INSERT = "INSERT INTO elementihtml (nickname,messaggio) values (?,?)";
    const READSINGLE = "SELECT * FROM elementihtml WHERE id_elemento=?";
    const READALLWHERE = "SELECT * FROM elementihtml WHERE pageName=?";
    const READALL = "SELECT * FROM elementihtml";
    const UPDATESINGLE = "UPDATE elementihtml SET testo=?, file_src=? WHERE id_elemento=?";
    //SPECIFICA
    const UPDATESINGLEELEMENT = "UPDATE elementihtml SET testo=?, file_src=? WHERE pageName=? AND id_elemento=?";
}



?>
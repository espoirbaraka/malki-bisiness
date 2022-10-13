<?php
    include("./bd_class.php");
    include("./stripe.php");

    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    $email           = $_POST["stripeEmail"];
    $prix          = $_POST["amount"]; 
    $client          = $_SESSION["client"]; 
    $charge = \Stripe\Charge::create([
        "amount" => $prix,
      "currency" => 'usd',
      "source"=> $token,
    ]);

    $data = [$token, $client, $prix];
    $req = "INSERT INTO t_paiement(CodeTransaction, Client, Montant) VALUES(?,?,?)";
    $res = $app->prepare($req, $data, 1);

    if($charge){
        $user = $_SESSION["client"];
        // $sql2 = "SELECT * FROM t_user WHERE CodeUser=$user";
        // $userrow = $app->fetch($sql2);
        // $contact = $userrow['Contact'];
        // $text = "Transaction reussi";
        // $source = "KIN MARCHE";
        // if($app->sendMessage($contact, $text, $source)){
            
        // }
        foreach ($_SESSION['cart'] as $key => $value){
            $quantite = $value['quantite'];
            $data = [$value['id']];
            $sql2 = "UPDATE t_approvisionnement SET Quantite=Quantite-$quantite WHERE CodeProduit=?";
            $res=$app->prepare($sql2, $data, 1);
        }


        $_SESSION['success'] = "Paiement bien effectué de $prix $ au compte de OK Market";
        unset($_SESSION['cart']);
      header("Location:../cart.php");
    }
?>
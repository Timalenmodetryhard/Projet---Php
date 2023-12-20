<?php
$error_name = "none";
$error_first_name = "none";
$error_password = "none";
$error_confirm_password = "none";
$error_email = "none";

$host = '51.158.59.186:14301';
$db   = 'ls';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

if (isset($_POST['envoi'])){
    $name = htmlspecialchars($_POST['name']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
 
    if ($name == ""){
        $error_name = "block";
    } else {
        $error_name = "none";
    }
    if ($first_name == ""){
        $error_first_name = "block";
    } else {
        $error_first_name = "none";
    }
    if ($password == "" ){
        $error_password = "block";
    } else {
        $error_password = "none";
    }
    if ($password !== $confirm_password){
        $error_confirm_password = "block";
    } else {
        $error_confirm_password = "none";
    }
    $statement = $pdo->query("SELECT * FROM user WHERE id > 0");
    if ($statement) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if ($row['email'] == $email || $email == ""){
                $error_email = "block";
            } else {
                $error_email = "none";
            }
        }
    }
    if ($error_password == "none" && $error_email == "none" && $error_name == "none" && $error_first_name == "none" && $error_confirm_password == "none") {
        $insertUser = $pdo->prepare("INSERT INTO user(name, first_name, email, password)VALUES(?, ?, ?, ?)");
        $insertUser->execute(array($name, $first_name, $email, $password));

        $recupUser = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $recupUser->execute(array($email, $password)); 

        $createPanier = $pdo->prepare("INSERT INTO panier(id, elements) VALUES (?, ?)");
        $createPanier->execute(array($recupUser->fetch()['id'], json_encode(array())));
    }  
    $recupUser = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $recupUser->execute(array($email, $password)); 
    if ($recupUser->rowCount()>0){
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $recupUser->fetch()['id'];
        header("Location: ?page=user_connexion");
    }
}

?>
<form class="form" method="POST" action="" align="center">
    <div class="input">
        <h1>Prénom</h1>
        <input name="name" type="text" autocomplete="on"></input>
        <p style="display: <?php echo $error_name ?>;">Veuillez rentrer votre prénom.</p>
    </div>
    <br/>
    <div class="input">
        <h1>Nom</h1>
        <input name="first_name" type="text" autocomplete="on"></input>
        <p style="display: <?php echo $error_first_name ?>;">Veuillez rentrer votre nom.</p>
    </div>
    <br/>
    <div class="input">
        <h1>Adresse mail</h1>
        <input name="email" type="email" autocomplete="on"></input>
        <p style="display: <?php echo $error_email ?>;">L'adresse est déjà utilisée ou manquante.</p>
    </div>
    <br/>
    <div class="input">
        <h1>Mot de passe</h1>
        <input name="password" type="password" autocomplete="off"></input>
        <p style="display: <?php echo $error_password ?>;">Mot de passe manquant.</p>
    </div>
    <br/>
    <div class="input">
        <h1>Confirmation du mot de passe</h1>
        <input name="confirm_password" type="password" autocomplete="off"></input>
        <p style="display: <?php echo $error_confirm_password ?>;">Le mot de passe ne correspond pas.</p>
    </div>
    <br/><br/>
    <input class="submit" type="submit" name="envoi" value="S'inscrire"></input>
</form>
<?php
$error_password = "none";
$error_email = "none";

$host = '51.158.59.186:14301';
$db   = 'ls';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
if (isset($_POST['envoi'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $recupUser = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $recupUser->execute(array($email, $password));

    $statement = $pdo->query("SELECT * FROM user WHERE id > 0");
    if ($statement) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if ($row['email'] == $email || $email == ""){
                $error_email = "block";
                if ($row['password'] == $password || $password == ""){
                    $error_password = "block";
                } else {
                    $error_password = "none";
                }
            } else {
                $error_email = "none";
                if ($row['password'] == $password || $password == ""){
                    $error_password = "block";
                } else {
                    $error_password = "none";
                }
            }
        }
    }

    if ($recupUser->rowCount()>0){
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["id"] = $recupUser->fetch()["id"];
        header("Location: ?page=accueil");
    }
}

$inscription = true;
$connexion = false;
?>
<form class="form" method="POST" action="" align="center">
    <div class="input">
        <h1>Adresse mail</h1>
        <input name="email" type="email" autocomplete="on"></input>
        <p style="display: <?php echo $error_email ?>;">L'adresse est introuvable ou manquante.</p>
    </div>
    <br/>
    <div class="input">
        <h1>Mot de passe</h1>
        <input name="password" type="password" autocomplete="off"></input>
        <p style="display: <?php echo $error_password ?>;">Le mot de passe est incorrect ou manquante.</p>
    </div>
    <br/><br/>
    <input class="submit" type="submit" name="envoi" value="Se connecter"></input>
</form>
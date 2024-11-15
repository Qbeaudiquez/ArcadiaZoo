<?php

$postData = $_POST;

if(isset($postData["userName"]) 
    && isset($postData["password"])){
    foreach($users as $user){
        if($postData["userName"] === $user["username"] &&
            $postData["password"] === $user["password"]){
                $_SESSION['LOGGED_USER'] = $user["username"];
                foreach($roles as $role){
                    if($role["role_id"] === $user["role_id"]){
                        $loggedRole = $role["label"];
                    }
                }
                    $_SESSION['LOGGED_MESSAGE'] = "{$user['firstname']} {$user['name']}" . '</br>' . $loggedRole;
                    break;
                }
    }
    
    if(!isset($_SESSION['LOGGED_USER'])){
        echo ("<script>alert('Utilisateur ou mot de passe incorect')</script>");
    }

}

?>

<?php if(!isset($_SESSION['LOGGED_USER'])) : ?>

    <li>
        <button class="connexionBtn link"><img src="/zoo-arcadia/asset/icon/log-out.svg" alt="logo connection" class="login"></button>
    </li>

        <li class="connexionContainer">
                <form action="../main/index.php" method="post" class="formConnexion">
                    <label for="userName" ></label>
                    <input type="text" id="userName" name="userName" placeholder="Pseudo">

                    <label for="password" name></label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe">

                    <input type="submit" value="Connexion" class="log-inBtn">
                </form>
        </li>

<?php else : ?>

    <li>
        <p class="username" style="color: var(--first-color); text-align: center;" >Bienvenue <?php echo $_SESSION['LOGGED_MESSAGE']?></p>
    </li>
    <li>
        <button class="deconnexionBtn link"><a href="/zoo-arcadia/src/logout.php"><img src="/zoo-arcadia/asset/icon/log-out.svg" alt="logo deconnection" class="login"></a></button>
    </li>

<?php endif; ?>
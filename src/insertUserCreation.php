<h3>Créer un nouveau compte</h3>
    <div class='dashbordContainer '>
        <form class="formulaire newUser" action="" method="post">
            <label for="nameUserNewUser">Nom d'utilisateur :</label>
            <input type="text" name="nameUserNewUser" id="nameUserNewUser" required>
            <label for="pwNewUser">Mot de passe :</label>
            <input type="text" name="pwNewUser" id="pwNewUser" required>
            <label for="nameNewUser">Nom :</label>
            <input type="text" name="nameNewUser" id="nameNewUser" required>
            <label for="fnNewUser">Prenom :</label>
            <input type="text" name="fnNewUser" id="fnNewUser" required>
            <label for="gradeNewUser">Choisissez un rôle :</label>
            <select name="gradeNewUser" id="gradeNewUser" required>
                <option value="2">Vétérinaire</option>
                <option value="3">Employé(e)</option>
             </select>
            <button type="submit">Créer</button>
        </form>
    </div>



<?php if(isset($_POST["nameUserNewUser"])){
    $dataPost = $_POST;
    try{
        $newUserStatement = $mysqlClient->prepare("INSERT INTO user (username, password, name, firstname, role_id) VALUES (:username, :password, :name, :firstname, :role_id)");
        $newUserStatement->execute([
            ':username' => $dataPost["nameUserNewUser"],
            ':password' => $dataPost["pwNewUser"],
            ':name' => $dataPost["nameNewUser"],
            ':firstname' => $dataPost["fnNewUser"],
            ':role_id' => $dataPost["gradeNewUser"]
        ]);
        echo "<script> alert('Enregistrement réussi')</script>";
    }catch(PDOException $exeption){
        echo "<script> alert('Une erreur est survenue {$exception->getMessage()}')</script>";
    }
}
    

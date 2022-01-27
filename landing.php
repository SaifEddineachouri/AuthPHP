<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    
    $req2 = $bdd->prepare('SELECT * FROM utilisateurs');
    $req2->execute();
    $data2 = $req2->fetch();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace Utilisateur </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
        <div class="container">
            <div class="col-md-12">
                <div class="text-center">
                        <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
                        <hr />
                              <table class="table table-dark">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php while($ligne = mysqli_fetch_array($data2)){ ?>
                                  <tr>
                                    <th scope="row"><?php echo $ligne['id']; ?></th>
                                    <td><?php echo $ligne['pseudo']; ?></td>
                                    <td><?php echo $ligne['email']; ?></td>
                                    <td><?php echo $ligne['password']; ?></td>
                                </tr>  
                                <?php } ?> 
                                </tbody>
                              </table>
                        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
                </div>
            </div>
        </div>
      </body>
</html>

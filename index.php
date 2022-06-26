<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet"  media="all" href="assets/css/index/style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <meta charset="UTF-8">
    </head>

    <body>
        <nav class="navbar">
            <form class="login_form" method="post" action="./controller/Users.php">
            <input type="hidden" name="type" value="login">

              <div class="email">
                <div class="font">Adresse Mail ou Mobile</div>
                <input type="text" name="usersEmailOrPhone" placeholder="votre login" required>
              </div>

              <div class="password">
                <div class="font">Mot de passe</div>
                <input type="password" name="usersPwd" placeholder="votre mot de passe" required>
                <div class="font"> <a href=""> Information de compte oubliée ?</a> </div>
              </div>

              <button>Connexion </button>
               
            </form>
          </nav>

          <section>
              <form class="register_form" method="post" action="./controller/Users.php">
                <input type="hidden" name="type" value="register">

                <h1> Inscription </h1>
                <h2> Et ce sera toujours gratuit </h2>

                <div class="sign_name">
                  <input class="firstname" type="text"     name="usersFname" placeholder="First name"            >
                  <input class="lastname"  type="text"     name="usersLname" placeholder="Last name"             >
                  <input class="email"     type="text"     name="usersEmailOrPhone" placeholder="Mobile number or Email">
                  <input class="password"  type="password" name="usersPwd"   placeholder="Password"              >
                  <input class="password2" type="password" name="usersPwd2"  placeholder="Confirm password"      >
                </div>

                  <div class="sign_birth">
                    <h3>Date de Naissance</h3>
                    <SELECT id ="day"   name = "usersDay" >   </SELECT>
                    <SELECT id ="month" name = "usersMonth">  </SELECT>
                    <SELECT id ="year"  name = "usersYear">   </SELECT>
                    <a href=""> Pourquoi indiquer ma date de naissance ?</a>
                  </div>

                  <div class="sign_gender">
                    <input type="radio" name="usersGender" value="Homme" id="y" />
                    <label for="y"> Homme </label>
                    <input type="radio" name="usersGender" value="Femme" id="z" />
                    <label for="z" >Femme</label>
                  </div>

                    <p>
                    En cliquant sur S’inscrire, vous acceptez nos <a href=""> Conditions </a> générales. Découvrez comment nous recueillons, 
                    utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment <a href=""> nous utilisons 
                    les cookies </a> et autres technologies similaires en consultant notre Politique d’utilisation des cookies. Vous recevrez 
                    peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.
                    </p>

                    <button>Inscription</button>

              </form>
          </section>

          <script src="assets/js/script.js"></script>

    </body>
</html>

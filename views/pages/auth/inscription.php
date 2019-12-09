<form method="POST" action="/inscription" class="row">
    <div class="form-group col-md-6 col-12">
        <label for="email">Adresse email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="a.nonyme@gmail.com" required>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="anonymeduweb" required>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="password">Mot de passe</label>
        <input type="password" name="motdepasse" class="form-control" id="password" placeholder="Mot de passe" required>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="password2">Mot de passe (confirmation)</label>
        <input type="password" name="motdepasse_confirm" class="form-control" id="password2" placeholder="Mot de passe (Confirmation)" required>
    </div>
    
    <div class="form-group col-md-4 col-12">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="42 rue du routeur" required>
    </div>
    <div class="form-group col-md-4 col-12">
        <label for="codepostal">Code postal</label>
        <input type="text" name="codepostal" class="form-control" id="pascodepostalsword" placeholder="42424" required>
    </div>
    <div class="form-group col-md-4 col-12">
        <label for="ville">Ville</label>
        <input type="text" name="ville" class="form-control" id="ville" placeholder="WebCity" required>
    </div>
    <button type="submit" class="btn btn-warning">S'inscrire</button>
</form>
<form method="POST" action="/ajout_annonce" enctype='multipart/form-data' class="row">
    <div class="form-group col-md-6 col-12">
        <label for="titre">Titre</label>
        <input type="text" name="titre" class="form-control" id="titre" placeholder="Ipad plaqué or" required>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="texte">Texte</label>
        <textarea name="texte" id="texte" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group col-md-6 col-12" id="photos_fields">
        <label for="photos">Photo</label>
        <input type="file" name="photos[]" class="form-control" id="photos" placeholder="Mot de passe" required>
    </div>
    <div class="form-group col-md-6 col-12">
        <label for="prix">Prix</label>
        <input type="text" name="prix" class="form-control" id="prix" placeholder="167000" required>
    </div>
    <a class="btn btn-warning" onclick="addFields()">Ajouter une photo</a>
    <button type="submit" class="btn btn-warning">S'inscrire</button>
</form>

<script type='text/javascript'>
    function addFields(){
        // Container <div> where dynamic content will be placed
        // var photos_fields = document.getElementById("photos_field");
        // Create an <input> element, set its type and name attributes
        var input = document.createElement("input");
        input.type = "file";
        input.name = "photos[]";
        input.className = "form-control"
        photos_fields.appendChild(input);
    }
</script>
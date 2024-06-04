<div class="step" data-target="#description-part">
    <button type="button" class="step-trigger" role="tab" aria-controls="description-part" id="description-part-trigger">
        <span class="bs-stepper-circle">1</span>
        <span class="bs-stepper-label">Description</span>
    </button>
</div>

<div class="bs-stepper-content">
    <!-- your steps content here -->
    <div id="description-part" class="content" role="tabpanel"
        aria-labelledby="description-part-trigger">
        <div class="form-group">
            <label for="titre">Titre du brief</label>
            <input type="text" class="form-control" id="titre" name="titre"
                value="Prototype">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="inputDescription"
                name="description" rows="3">Description du projet</textarea>
        </div>
        <div class="form-group">
            <label for="travail">Travail à faire</label>
            <textarea class="form-control" id="inputTravailafaire"
                name="travail"
                rows="3">Concevoir et développer un site Web responsive pour le client</textarea>
        </div>
        <div class="form-group">
            <label for="critere">Critère de validation</label>
            <textarea class="form-control" id="inputcriterevalidation"
                name="critere"
                rows="3">Le site Web doit être entièrement responsive, respecter les meilleures pratiques en développement Web et répondre aux exigences du client.</textarea>
        </div>
        <div class="form-group" id="deliverables-container">
            <label for="livrable">Nom de livrable</label>
            <input type="text" class="form-control mb-3"
                name="deliverable[]" placeholder="Nom de livrable"
                value="Presentation">
        </div>
        <button type="button" class="btn btn-primary"
            onclick="addInput()">Ajouter un autre livrable</button>



        <div class="form-group">
            <label for="dateDebut">Date de début</label>
            <input type="date" class="form-control" id="dateDebut"
                name="dateDebut" value="2022-01-01">
        </div>
        <div class="form-group">
            <label for="dateFin">Date de fin</label>
            <input type="date" class="form-control" id="dateFin"
                name="dateFin" value="2022-01-31">
        </div>
        <div class="form-group">
            <label for="project_resources">Resources</label>
            <div class="input-group mb-3">
                <input type="text"
                    class="form-control new-link-input resource-link"
                    placeholder="Enter a link">
                <div class="input-group-append">
                    <button type="button"
                        class="btn btn-outline-success add-link-btn">Ajouter
                        un
                        lien</button>
                </div>
            </div>
            <ul class="list-group linked-items resource-list">
            </ul>
        </div>
        <div class="form-group">
            <label for="project_references">Reference</label>
            <div class="input-group mb-3">
                <input type="text"
                    class="form-control new-link-input reference-link"
                    placeholder="Enter a link">
                <div class="input-group-append">
                    <button type="button"
                        class="btn btn-outline-success add-link-btn">Ajouter
                        un
                        lien</button>
                </div>
            </div>
            <ul class="list-group linked-items reference-list">
            </ul>
        </div>



        <button class="btn btn-primary"
            onclick="stepper.next()">Suivant</button>
    </div>
    
</div>
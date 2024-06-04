<div class="step" data-target="#competence-part">
    <button type="button" class="step-trigger" role="tab" aria-controls="competence-part" id="competence-part-trigger">
        <span class="bs-stepper-circle">2</span>
        <span class="bs-stepper-label">Competence</span>
    </button>
</div>
<div class="bs-stepper-content">
    <!-- your steps content here -->
    
    <div id="competence-part" class="content" role="tabpanel"
        aria-labelledby="projet-part-trigger">
        <div class="form-group">
            <h2>Compétences</h2>
            <p>Veuillez sélectionner les compétences que vous possédez.</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Competence</th>
                        <th>Niveaux</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" id="competence_mobile"
                                    value="imiter">
                                <i class="fas fa-mobile-alt"></i> Maquetter
                                une
                                application mobile
                            </label>
                        </td>
                        <td>
                            <select name="competence_mobile_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" id="competence_db"
                                    value="adapter">
                                <i class="fas fa-database"></i> Manipuler
                                une
                                base de données - perfectionnement
                            </label>
                        </td>
                        <td>
                            <select name="competence_db_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence"
                                    id="competence_backend"
                                    value="transposer">
                                <i class="fas fa-code"></i> Développer la
                                partie
                                back-end d’une application web ou web mobile
                                -
                                perfectionnement
                            </label>
                        </td>
                        <td>
                            <select name="competence_backend_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" value="other" checked>
                                <i class="fas fa-cogs"></i> Collaborer à la
                                gestion d’un projet informatique et à
                                l’organisation de l’environnement de
                                développement
                            </label>
                        </td>
                        <td>
                            <select name="competence_deploy_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" value="other" checked>
                                <i class="fas fa-cogs"></i> Développer une
                                application web responsive avec HTML, CSS et
                                JavaScript
                            </label>
                        </td>
                        <td>
                            <select name="competence_deploy_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" value="other" checked>
                                <i class="fas fa-cogs"></i> Utiliser un
                                framework PHP pour le développement backend
                                (par
                                exemple, Laravel)
                            </label>
                        </td>
                        <td>
                            <select name="competence_deploy_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="checkbox" class="mr-2"
                                    name="competence" value="other" checked>
                                <i class="fas fa-cogs"></i> Créer et gérer
                                une
                                base de données MySQL pour l'application web
                            </label>
                        </td>
                        <td>
                            <select name="competence_deploy_level"
                                class="form-control">
                                <option value="imiter">Imiter</option>
                                <option value="adapter">Adapter</option>
                                <option value="transposer">Transposer
                                </option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
        <button class="btn btn-primary"
            onclick="stepper.previous()">Précédent</button>
        <button class="btn btn-primary"
            onclick="stepper.next()">Suivant</button>
    </div>
   
</div>
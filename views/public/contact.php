<?php ob_start();  ?>

    
        
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 offset-3">
                                        <h1 class="display-2 text-primary mt-5 mb-5 text-center border border-dark " >Contactez-nous </h1>
                                    </div>
                                </div>
                            </div>
                      
                    
                    <div class="container ">
                        <div class="row">
                            <div class="col">
                                <form class=" col-6 offset-3">
                                    <div class="mb-3 ">
                                        <label htmlfor="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez votre Nom"/>
                                    </div>
                                    <div class="mb-3">
                                        <label htmlfor="prenom" class="form-label">Prenom</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre Prenom"/>
                                    </div>
                                    <div class="mb-3">
                                        <label htmlfor="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre E-mail"/>
                                    </div>
                                    <label htmlfor="floatingTextarea2">Votre Message</label>
                                        <div class="form-floating mb-5" >
                                            <textarea class="form-control" placeholder="Message" id="floatingTextarea2" ></textarea>
                                        </div>
                                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                                </form>
                            </div>
                            
                            <div class="col">
                                <form class=" col-6 offset-3">
                                    <div class="mb-3 mt-4 text-danger ">
                                        <p class="display-5">BADNeWS inc&copy;</p>
                                    </div>
                                    <div class="mb-4 mt-4 ">
                                       <p class=" display-6">16 street du Paradis Manhattan</p>
                                    </div>
                                    <div class="mb-5">
                                       <p class="display-6">badnews@gmail.com</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <div class=" mt-5 offset-0 col-12 ">
                                <div id="map-container-google-1" class="z-depth-1-half map-container mb-5">
                                    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameBorder="0"
                                    allowfullscreen width= "100%" height="400px" >
                                    </iframe>
                                </div>
                            </div>
                     </div>


    
                     <?php $contenu = ob_get_clean();
    require_once("./views/public/templatePublic.php");
?>

<?php require_once("../inc/functions.inc.php"); ?>
<div class="col-2 p-0">
            <div class="d-flex flex-column h-100 align-items-center justify-content-md-center">
                <div class=" text-center p-3 w-100 bg-success">
                    <img src="/imgs/ofppt_icon.png" class="img-fluid LoginIcon" alt="">
                    <div class="text-light">ISTA LARACHE</div>
                    <p class="text-white-50">Administrateur</p>
                </div>
                <div class=" text-center pt-4 h-100 w-100 bg-primary">
                    <div class="menuItem d-flex  flex-column align-items-start">
                        <button menu="Membres_Menu"
                            class="ps-3 pe-3 rounded-pill btn btn-info text-white mb-3 m-0 w-100 align-items-stretch MenuItem">
                            <div class="row">
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_Membres.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon "
                                        alt="">
                                </div>
                                <div class="col-8 p-0 position-relative">
                                    <div
                                        class=" w-100 fw-bold small position-absolute top-50 start-50 translate-middle">
                                        Membres
                                    </div>
                                </div>
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_ActiveMenuItem.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon"
                                        alt="">
                                </div>
                            </div>
                        </button>
                        <button menu="EmploiDuTemp_Menu"
                            class="ps-3 pe-3 rounded-pill btn btn-info text-white mb-3 m-0 w-100 align-items-stretch MenuItem">
                            <div class="row">
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_EmploiDuTemp.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon "
                                        alt="">
                                </div>
                                <div class="col-8 p-0 position-relative">
                                    <div class=" w-100 fw-bold small position-absolute top-50 start-50 translate-middle">
                                        Emploi
                                        du temp</div>
                                </div>
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_ActiveMenuItem.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon"
                                        alt="">
                                </div>
                            </div>
                        </button>
                        <button menu="TablauDesNotes_Menu"
                            class="ps-3 pe-3 rounded-pill btn btn-info text-white mb-3 m-0 w-100 align-items-stretch MenuItem">
                            <div class="row">
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_TablauDesNotes.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon "
                                        alt="">
                                </div>
                                <div class="col-8 p-0 position-relative">
                                    <div
                                        class=" w-100 fw-bold small position-absolute top-50 start-50 translate-middle">
                                        Tablau des Notes
                                    </div>
                                </div>
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_ActiveMenuItem.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon"
                                        alt="">
                                </div>
                            </div>
                        </button>
                        <button menu="AnnoncesEtArticles_Menu"
                            class="ps-3 pe-3 rounded-pill btn btn-info text-white mb-3 m-0 w-100 align-items-stretch MenuItem">
                            <div class="row">
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_AnnoncesEtArticles.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon "
                                        alt="">
                                </div>
                                <div class="col-8 p-0 position-relative">
                                    <div
                                        class=" w-100 fw-bold small position-absolute top-50 start-50 translate-middle">
                                        Annonces Et Articles
                                    </div>
                                </div>
                                <div class="col-2 p-0 position-relative">
                                    <img src="/imgs/Dashboard_ActiveMenuItem.png"
                                        class="position-absolute start-50 top-50 translate-middle img-fluid MenuIcon"
                                        alt="">
                                </div>
                            </div>
                        </button>
                        <script type="text/javascript">
                            $(".menuItem").find("button").attr("id","");
                                    $(".menuItem").find("button").find("img").each(function(i,e){
                                        var src = e.getAttribute("src");
                                        if(src.includes("_Active.")){
                                            src = src.split("_Active").join("");
                                            console.log(e);
                                            console.log(src);
                                        }
                                        e.setAttribute("src",src);
                                    });
                                    var $tar = $('button[menu="<?php echo parsePathToTag($_SESSION["currentPath"]);?>"]');
                                    $tar.attr("id","active");
                                    var attr = $tar.find("img").first().attr("src");
                                    attr = attr.split(".").join("_Active.");
                                    $tar.find("img").first().attr("src",attr);
                                        
                            $(".menuItem").find("button").on("click",function(){
                                $(".menuItem").find("button").attr("id","");
                                $(".menuItem").find("button").find("img").each(function(i,e){
                                    var src = e.getAttribute("src");
                                    if(src.includes("_Active.")){
                                        src = src.split("_Active").join("");
                                        console.log(e);
                                        console.log(src);
                                    }
                                    e.setAttribute("src",src);
                                });
                                $(this).attr("id","active");
                                var attr = $(this).find("img").first().attr("src");
                                attr = attr.split(".").join("_Active.");
                                $(this).find("img").first().attr("src",attr);

                                //Fire a PHP function
                                var menu = $(this).attr("menu");

                                $.post("../inc/functions.inc.php", { function_name: menu }, function(d) {
                                    // Handle the response here
                                    var data = JSON.parse(d);
                                    window.location = data.url;
                                    console.log(data);

                                    // $(".menuItem").find("button").attr("id","");
                                    // $(".menuItem").find("button").find("img").each(function(i,e){
                                    //     var src = e.getAttribute("src");
                                    //     if(src.includes("_Active.")){
                                    //         src = src.split("_Active").join("");
                                    //         console.log(e);
                                    //         console.log(src);
                                    //     }
                                    //     e.setAttribute("src",src);
                                    // });
                                    // var $tar = $('div[menu="'+<?php echo $_SESSION["currentPath"];?>+'"]');
                                    // $tar.attr("id","active");
                                    // var attr = $tar.find("img").first().attr("src");
                                    // attr = attr.split(".").join("_Active.");
                                    // $tar.find("img").first().attr("src",attr);
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
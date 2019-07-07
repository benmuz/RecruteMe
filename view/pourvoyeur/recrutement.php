<?php
$title="Profil du professionnel";
include '../header.php';
?>
<body>
<?php
include '../nav.php';
?>
<style>
    body{
        background-color:#f1f1f1;
        padding-top: 3.5rem;
    }
    #recrutements{
        background-position: center;
        background: url("../static/img/Recrutement-.jpg");
        background-clip: content-box;
        background-attachment: scroll;
        background-size: cover;
        min-height:15rem;
    }
</style>
<div class="container-fluid navigation-customize">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h5 class="text-success">Retrouver des Profils pour votre entreprise ...</h5>
            </div>
            <div class="col-sm-6">
                <?php require_once '../../globals/getId.php';?>
                <div class="box-text-profilp">
                    <form action="filter.php" method="get">
                        <div class="form-group">
                            <div class="form-input">
                                <div class="input-group-append">
                                    <input type="search" name="employee_search" id="employee_search" autocomplete="on" class="form-control-input" placeholder="Saisissez le profil dont vous avez besoin pour votre recreutement">
                                    <button type="submit" name="<?=ID_USER?>" class="btn btn-success" value="" style="margin-left: -40px;border-radius: inherit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <p class="employee_data" id="employee_data" ></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="separator"></div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <div class="featurette-divider"></div>
                    <div class="">
                        <h3><i class="fa fa-users"></i> Lancez-vous</h3>
                        <hr>
                        <small style="color: #08345f"><em>c'est simple, facile et efficace avec <?=WEBSITE_NAME?>, dans la barre de recherche saisissez le profil ou un poste de travail que vous voulez pour enfin en trouver le professionnel correspondant
                            à votre profil ou le poste.</em></small>
                    </div>

                </div>
                <div class="card-body">
                    <div id="recrutements"></div>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="card">
                <div class="card-header">

                </div>
            </div>
            <div class="featurette-divider"></div>
        </div>

        <!--=====================================================--->
        <div class="col-md-5" id="profil_container">
            <div>
                <div class="box-profil_container">
                    <h5><i class="fa fa-file-text-o"></i> L'offre d'emploi ?</h5>
                    <small><em>est-ce que vous recrutez?</em></small><br>
                    <small>Informez les autres d'un offre d'emplois grace à une annonce sur le site.</small>
                    <hr>
                    <a href="pub_offre.php?<?=ID_USER?>">
                        <button type="button" class="btn btn-sm btn-success">Publier une annonce</button>
                    </a>
                </div>
            </div>

            <div class="details_resultat">
                <div class="box-profil_container" >
                    <h5><i class="fa fa-send"></i><i class="fa fa-commenting-o"></i> &nbsp;Mes Annonces </h5>
                    <hr>
                    <p>vous pouvez consulter l'ensemble de vos annonces sur ce site,
                        l'historique de vos annonces n'est plus à chercher avec beaucoups
                        de peines mais nous archivons cela pour vous permettre une bonne visualisation.</p>
                    <button class="btn btn-nav btn-sm"><i class="fa fa-eye"></i> Detail</button>
                </div>
            </div>
            <div class="box-profil_container list_annonces" id="img-box-profil_container">
                <figure>
                    <img src="../static/img/recrutement.jpg" width="100%">
                </figure>
            </div>
        </div>

        <!--=====================================================--->
    </div>
</div>
<style>
    .result:hover{
        cursor: pointer;
        background-color: #0c5460;
        color: #fff;
    }
</style>
<?php include '../footer.php';?>
</body>
<script>
    function showValueFromSearch(result){
        var x=result.innerHTML;
        var emplyee=document.getElementById('employee_search').value=x;

    }
    $(document).ready(function () {
        $('#employee_search').keyup(function () {

            var search=$('#employee_search').val();

            $.ajax({
                url:'../../controller/search_profil.php',
                data:'s='+search,
                success:function (data) {
                    $('#employee_data').html(data);
                }
            })
        });

        //load_data('');
        function load_data(query,typehead_search='yes') {
            $.ajax({
                url:'../../controller/fetch.php',
                method:"POST",
                data:{
                    query:query,
                    typehead_search:typehead_search
                },
                success:function (date) {
                    $('#employee_data').html(data);
                }

            })
        }

        /*$('#employee_search').typehead({
           source:function (query,resultat) {
               $.ajax({
                   url:'fetch.php',
                   method:'POST',
                   data:{query:query},
                   datatype:"json",
                   success:function (data) {
                       resultat($.map(data, function (item) {
                           return item;
                       }));
                       load_data(query, 'yes');
                   }
               })
           }
        });*/

        $(document).on('click','li',function () {
           var query=$(this).text();
           load_data(query);
        });
        
        fadeimg();
        function fadeimg(){
            var folder="static/img";
            var count=0;
            var images=["../../static/img/recrutement.jpg","../static/img/Recrutement-1.jpg","../static/img/recrutement2.png"];
            var image=$('#img-box-profil_containe');

            image.css(
                "background-image","url("+images[count]+")"
            )
            setInterval(function () {
                image.fadeOut(200,function () {
                    image.css("background-image","url("+images[count++]+")");
                    image.fadeIn(200);
                });
                if(count==images.length){
                    count=0;
                }
            },6000);
        }

        $('#link_login').click(function () {
            $('#login').modal();
        });

    });
</script>
<script>
    CKEDITOR.replace('descriptionPublication');
    CKEDITOR.editorConfig = function( config ) {
        config.language = 'fr';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = false;
    };
    $(document).ready(function(){
        $("span.timeago").timeago();
    });
</script>


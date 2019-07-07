$(document).ready(function(){

    addExperience();
    addFormation();
    addCompetence();
    addCertification();
    addLanguage();

    var i=1;
    $('#add').click(function () {
        i++;
        $('#dynamyc_field').append('<tr id="row'+i+'">' +
            '<td><input id="descriptionComp" name="descriptionComp[]" placeholder="votre description..." class="form-control name_list"></td>' +
            '<td><button type="button" name="remove" data-row="row'+i+'" class="btn_remove btn btn-danger">X</button></td>' +
            '</tr>');
    });
    $(document).on('click','.btn_remove',function () {
        var delete_row=$(this).data("row");
        $('#'+ delete_row).remove();
    });

    function addExperience(){
        $('#experienceEXP').find('select[name=dateDebutExp],select[name=dateFinExp],input[name=titrePostExp],input[name=nomEntrepriseExp],select[name=secteurActiviteExp],textarea[name=descriptionExp]').each(function () {
            $(this).focus(function () {
                $(this).removeClass('input-error').addClass('input-success');
            });
        });
        $('#enregisterExp').click(function () {
            alert('');
            var dateDebutExp=$('.dateDebutExp').val();
            var dateFinExp=$('.dateFinExp').val();
            var titrePostExp=$('#titrePostExp').val();
            var nomEntrepriseExp=$('#nomEntrepriseExp').val();
            var secteurActiviteExp=$('#secteurActiviteExp').val();
            var descriptionExp=$('#descriptionExp').val();


            if( dateDebutExp== "" || dateFinExp== "" || titrePostExp== ""|| nomEntrepriseExp == "" || secteurActiviteExp == "" || descriptionExp == "" ) {
                $('#experienceEXP').find('select[name=dateDebutExp],select[name=dateFinExp],input[name=titrePostExp],input[name=nomEntrepriseExp],select[name=secteurActiviteExp],textarea[name=descriptionExp]').each(function () {
                    $(this).addClass('input-error');
                })
            }
            else{
                $.ajax({
                    url:"../../controller/addExperiences.php",
                    type:"post",
                    data:{
                        "dateDebutExp":dateDebutExp,
                        "dateFinExp":dateFinExp,
                        "titrePostExp":titrePostExp,
                        "nomEntrepriseExp":nomEntrepriseExp,
                        "secteurActiviteExp":secteurActiviteExp,
                        "descriptionExp":descriptionExp
                    },
                    success:function(data){
                        $('#msgE').html(data);
                        $('input,textarea').val('');
                    }
                });
            }
        });
    }
    function addFormation(){
        $('#formationEU').click(function () {
            var dateDebut=$('#dateDebut').val();
            var dateFin=$('#dateFin').val();
            var titreDiplome=$('#titreDiplome').val();
            var ecoleUniversite=$('#ecoleUniversite').val();
            var descriptionFormat=$('#descriptionFormat').val();

            if( dateDebut== "" || dateFin== "" || titreDiplome== ""|| ecoleUniversite == "" || descriptionFormat == "" ) {
                $('input[name=titreDiplome],textarea[name=descriptionFormat]').addClass('input-error');
            }
            else{

                $.ajax({
                    url:"../../controller/addFormation_education.php",
                    type:"post",
                    data:{
                        "dateDebut":dateDebut,
                        "dateFin":dateFin,
                        "titreDiplome":titreDiplome,
                        "ecoleUniversite":ecoleUniversite,
                        "descriptionFormat":descriptionFormat
                    },
                    success:function(data){
                        $('#msgFormation').html(data).css({'color':'#003333'}).fadeOut(2500);
                        $('input[name=titreDiplome],textarea[name=descriptionFormat]').val('');
                    }
                })
            }
        });
    }


    function addCompetence(){
        $('#competence').click(function () {
            var descriptionComp=$('#descriptionComp').val();

            if( descriptionComp == "" || descriptionComp=="-") {
                $('input[name=descriptionComp]').addClass('input-error');
            }
            else{
                $.ajax({
                    url:"../../controller/addCompetences.php",
                    type:"post",
                    data:$('#add_competence').serialize(),
                    success:function (data) {
                        $('#msgComp').html(data).css({'color':'#003333'}).fadeOut(2500);
                        $('#add_competence')[0].reset();
                    }
                });

            }
        });
    }
    function addCertification(){
        $('#enregistrerCert').click(function () {
            var descriptionCert=$('#descriptionCert').val();
            var lieuCert=$('#lieuCert').val();
            var titreCert=$('#titreCert').val();

            if( descriptionCert == "" || descriptionCert=="-" || lieuCert=="" ||titreCert=="" ) {
                $('textarea[name=descriptionCert],input[name=titreCert],input[name=lieuCert]').addClass('input-error');
            }
            else{
                $.ajax({
                    url:"../../controller/addCertifications.php",
                    type:"post",
                    data:{
                        "descriptionCert":descriptionCert,
                        "lieuCert":lieuCert,
                        "titreCert":titreCert
                    },
                    success:function(data){
                        $('#msgCert').html(data).css({'color':'#003333'}).fadeOut(2500);
                        $('textarea[name=descriptionCert],input[name=lieuCert]').val('');
                    }
                })
            }
        });
    }
    function addLanguage(){
        $('#enregistrerLangue').click(function () {
            var langue=$('#langue').val();
            var niveau=$('#niveau').val();

            if( langue == "" || langue=="-" || niveau=="") {
                $('select[name=niveau],input[name=langue]').addClass('input-error');
            }
            else{
                $.ajax({
                    url:"../../controller/addLanguage.php",
                    type:"post",
                    data:{
                        "langue":langue,
                        "niveau":niveau
                    },
                    success:function(data){
                        $('#msgLangue').html(data).css({'color':'#003333'}).fadeOut(4500);;
                        $('select[name=niveau],input[name=langue]').val('');
                    }
                })
            }
        });
    }
    $("span.timeago").timeago();
});


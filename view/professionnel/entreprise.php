<?php
$title="Liste de tous les professionnels ";
include '../header.php';

?>
<style>
    .d{
        z-index: 1029;
        position: fixed;

    }
    html, body {
        height: 100%;
        color: #656565;
    }

    a:focus {
        outline: none;
    }

    .wrapper {
        min-height: 100%;
        height: auto !important;
        max-height: 100%;
        margin: 0 auto -120px;
    }
    .push {
        height: 5rem;
    }
</style>
<?php include '../nav.php';?>
<?php require_once '../../globals/typeCompte.php';?>
<body class="body-professionnel">
<?php if(isset($_SESSION['pseudo'])):?>
    <div class="container">
        <h3 class="text-center">CEUX QUI RECRUTENT, ILS NOUS FONT CONFIANCE</h3>
        <div class="featurette-divider"></div>
        <div class="row">
            <div class="offset-3 col-sm-6">
                <input type="search" class="form-control">
            </div>
        </div>
        <div class="separator"></div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Different secteur d'activite</h5>
                        <hr>

                    </div>
                </div>
            </div>
            <div class="box-profil_container col-md-8">
                <div class="thumbnails">
                    <ul class="thumbnails gridex">
                        <li class="span3">
                            <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar_pourv/avatar_pourv.jpg" /> </a>
                            <!-- gd-expander required -->
                            <div class="gd-expander">
                                <!-- gd-inner optional -->
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/avatar_pourv.jpg" />
                                        </div>
                                        <div class="span6">
                                            <h2 class="text-center">Heading text 1</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="thumbnails gridex">
                        <li class="span3">
                            <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar_pourv/avatar_pourv.jpg" /> </a>
                            <!-- gd-expander required -->
                            <div class="gd-expander">
                                <!-- gd-inner optional -->
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/avatar_pourv.jpg" />
                                        </div>
                                        <div class="span6">
                                            <h2 class="text-center">Heading text 1</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="thumbnails gridex">
                        <li class="span3">
                            <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar_pourv/avatar_pourv.jpg" /> </a>
                            <!-- gd-expander required -->
                            <div class="gd-expander">
                                <!-- gd-inner optional -->
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/avatar_pourv.jpg" />
                                        </div>
                                        <div class="span6">
                                            <h2 class="text-center">Heading text 1</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="thumbnails gridex">
                        <li class="span3">
                            <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar_pourv/avatar_pourv.jpg" /> </a>
                            <!-- gd-expander required -->
                            <div class="gd-expander">
                                <!-- gd-inner optional -->
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/avatar_pourv.jpg" />
                                        </div>
                                        <div class="span6">
                                            <h2 class="text-center">Heading text 1</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar_pourv/logo%20(3).png" /> </a>
                            <div class="gd-expander">
                                <div class="gd-inner">
                                    <div class="row-fluid">
                                        <div class="span6 text-center">
                                            <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar_pourv/logo%20(3).png"  />
                                        </div>
                                        <div class="span6">
                                            <h2>Heading text 2</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>
                                            <a href="#" class="btn btn-success">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="push"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php';?>
    <script src="../static/dist/js/bootstrap-gridex.min.js"></script>
    <script>
        $(function() {
            $('.gridex').gridex();
        })
    </script>
    <script>

        $(document).ready(function(){

            $('.comentaire').popover({
                title:fetchData,
                html:true,
                placement:'right',
            });

            function fetchData(){
                var fetch_data='';
                var element=$(this);
                var id=element.attr("id");

                $.ajax({
                    url:"../../controller/t.php",
                    method:"POST",
                    async:false,
                    data:{id:id},
                    success:function(data){
                        fetch_data=data;
                    }
                });
                return fetch_data;
            }
        });
    </script>
<?php else: header('location:index.php');?>
<?php endif;?>

</body>
</html>

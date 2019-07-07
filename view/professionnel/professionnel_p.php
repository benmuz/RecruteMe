<?php
$title="Liste de tous les professionnels ";
include '../header.php';

?>

<?php include '../nav.php';?>
<?php require_once '../../globals/typeCompte.php';?>
<body class="body-professionnel">
<?php if(isset($_SESSION['pseudo'])):?>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
                <figure>
                    <img src="../../avatar/<?=$_SESSION['avatar']?>" width="75" height="75" style="border-radius: 50%">
                </figure>
            </div>
            <div class="col-sm-7">
                <div style="padding-top: 1rem"></div>
                <input type="text" class="form-control search" placeholder="chercher un professionnel...">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="box-profil_container col-sm-8">
                        <div class="thumbnails">
                            <ul class="thumbnails gridex">
                                <li class="span3">
                                    <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar/1b6eef16-85f7-41b1-a292-fbe8d82d2b0e.jpg" /> </a>
                                    <!-- gd-expander required -->
                                    <div class="gd-expander">
                                        <!-- gd-inner optional -->
                                        <div class="gd-inner">
                                            <div class="row-fluid">
                                                <div class="span6 text-center">
                                                    <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar/1b6eef16-85f7-41b1-a292-fbe8d82d2b0e.jpg" />
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
                                    <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar/7e559c93-7b7d-4b81-b029-2b038d126195.jpg" /> </a>
                                    <div class="gd-expander">
                                        <div class="gd-inner">
                                            <div class="row-fluid">
                                                <div class="span6 text-center">
                                                    <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar/7e559c93-7b7d-4b81-b029-2b038d126195.jpg"  />
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
                                    <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar/25d0a086-f3a0-48ef-9621-0bed8eb60aab.jpg" /> </a>
                                    <div class="gd-expander">
                                        <div class="gd-inner">
                                            <div class="row-fluid">
                                                <div class="span6 text-center">
                                                    <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar/25d0a086-f3a0-48ef-9621-0bed8eb60aab.jpg"/>
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
                                    <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar/69edf07b-626b-4cdf-a361-6cb42805cb9c.jpg" /> </a>
                                    <div class="gd-expander">
                                        <div class="gd-inner">
                                            <div class="row-fluid">
                                                <div class="span6 text-center">
                                                    <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar/69edf07b-626b-4cdf-a361-6cb42805cb9c.jpg"/>
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
                                    <a href="#" class="thumbnail"> <img width="120" height="80"  src="../../avatar/about-img6.jpg" /> </a>
                                    <!-- gd-expander required -->
                                    <div class="gd-expander">
                                        <!-- gd-inner optional -->
                                        <div class="gd-inner">
                                            <div class="row-fluid">
                                                <div class="span6 text-center">
                                                    <img alt="270x170" class="img-polaroid" width="120" height="80" src="../../avatar/about-img6.jpg" />
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
                                    <a href="#" class="thumbnail" style="border: 1px solid #07345c;"> <img width="120" height="80" alt="270x170" src="../../avatar/img1.jpg" /> </a>
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
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5></h5>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-header, h4, .close {
            background-color: #0c5460;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-body{
            width:100%;
            background-color: #0c5464;
        }
        .modal-body form input[type:'text']{
            width:100%;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
<?php include '../footer.php';?>
    <script src="../static/dist/js/bootstrap-gridex.min.js"></script>
    <script>
        $(function() {
            $('.gridex').gridex();
        })
    </script>
    <script>

        CKEDITOR.replace('descriptionPublication');
        $(document).ready(function(){
            $("span.timeago").timeago();

            $("#getDetail").click(function(){
                $("#pub_annonce").modal();
            });

            $("#getarticle").click(function(){
                $("#pub_article").modal();
            });

            $("#getidee").click(function(){
                $("#pub_idee").modal();
            });

            $('.showing-detail').click(function(){
                $('#').slideToggle(400);
            });

            $('.dropdown').click(function () {
                $('.dropdown-menu').show();
            });

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

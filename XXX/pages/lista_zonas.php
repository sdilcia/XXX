<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/Logo de SAG Vertical fondo blanco.png">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>SAG - Secretaría de Agricultura y Ganaderia - Gobierno de la República de Honduras</title>

    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/mainlogin.css">
    <link rel="stylesheet" href="../css/util.css">

    <link rel="stylesheet" href="../css/home_page_users.css">

</head>

<body>

    <header id="header" id="home">

        <div class="header-top">
            <div class="header-top-right no-padding">
                <img src="../img/Logo SAG Horizontal nuevo.png" alt="Logo SAG" class="header-sag">
                <img src="../img/infoagro textual.png" alt="Logo INFOAGRO" class="header-sag">
                <img src="../img/LOGO FHIA.jpg" alt="Logo FHIA" class="header-fhia">
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active">
                            <a href="home_admin.html">Home</a>
                        </li>
                        <li>
                            <a href="pages/login.html">Nombre de usuario</a>
                        </li>

                        <li>
                            <a href="#footerSection">Salir</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="banner-area" id="home">

        <div class="bg-contact2" style="background-image: url('../img/cacao2.jpg');">
            <div class="container-contact2" style="margin-top: 127px">
                <!-- Page Container -->
                <div class="w3-content w3-margin-top" style="max-width:1400px;">

                    <!-- The Grid -->
                    <div class="w3-row-padding">

                        <!-- Left Column ; margin-left: -170px -->
                        <div class="w3-third" style="margin-top: 127px">

                            <div class="w3-white w3-text-grey w3-card-4">

                                <div class="w3-container ">

                                    <h2>Jane Doe</h2>
                                    <p>
                                        <i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Administrador</p>
                                    <p>
                                        <i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Zona</p>
                                    <p>
                                        <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Correo</p>
                                    <p>
                                        <i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
                                    <hr>

                                    <button class="accordion">REPORTES</button>
                                    <div class="panel">
                                        <li>
                                            <a href="reporte_zona.html">Reportes por zonas</a>
                                        </li>
                                        <li>
                                            <a href="reporte_semanal.html">Reporte semanal</a>
                                        </li>
                                        <li>
                                            <a href="reporte_mensual.html">Reportes mensual</a>
                                        </li>
                                        <li>
                                            <a href="reporte_llamadas.html">Reportes de llamadas</a>
                                        </li>
                                    </div>

                                    <button class="accordion">USUARIOS</button>
                                    <div class="panel">
                                        <li>
                                            <a href="registar_usuario.html">Registrar usuario</a>
                                        </li>
                                        <li>
                                            <a href="historial_usuarios.html">Historial de usuarios</a>
                                        </li>
                                    </div>
                                    <button class="accordion">ZONAS</button>
                                    <div class="panel">
                                        <li>
                                            <a href="registar_zona.html">Registrar zona</a>
                                        </li>
                                        <li>
                                            <a href="lista_zonas.html">Lista de zonas</a>
                                        </li>
                                    </div>
                                </div>

                                <br>




                            </div>
                            <br>

                            <!-- End Left Column -->
                        </div>

                        <!-- Right Column  style="width: 935px;"-->
                        <div class="w3-twothird" style="margin-top: 127px">

                            <div class="w3-container w3-card w3-white w3-margin-bottom">
                                <span class="contact2-form-title" style="margin-top: 30px">
                                    LISTADO DE ZONAS
                                </span>

                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre..">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>identificador de zona</th>
                                            <th>nombre de zona</th>
                                            <th>técnico encargado</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()"> </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()"> </td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()">
                                            </td>
                                        </tr>

                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()"> </td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()"> </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>

                                            <td>
                                                <a href="modificar_zona.html">
                                                    <img src="../img/elements/edit-file.png" alt="modificar" height="42" width="42" )> </a>
                                            </td>
                                            <td>
                                                <img src="../img/elements/eliminar.png" alt="eliminar" height="42" width="42" ) onclick="eliminarZona()"> </td>
                                        </tr>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>identificador de zona</th>
                                            <th>nombre de zona</th>
                                            <th>técnico encargado</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>



                            </div>



                            <!-- End Right Column -->
                        </div>

                        <!-- End Grid -->
                    </div>

                    <!-- End Page Container -->
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area section-gap" id="footerSection">
        <div class="col-lg-6 col-md-6 col-sm-6 social-widget ">
            <div class="single-footer-widget footer-redes">
                <h6>Siguenos</h6>
                <div class="footer-redes">
                    <a href="https://www.facebook.com/saghn" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.twitter.com/saghonduras" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="single-footer-widget"></div>
            <p class="footer-text">
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved
                <br> Estudiantes UNAH
                <br> INGENIERIA DEL SOFTWARE</a>
            </p>
        </div>
        </div>
    </footer>

    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/mainlogin.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/select2.min.js"></script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

        //Funcion para eliminar zona
        function eliminarZona() {
            confirm("¿Está seguro que desea eliminar el zona: ....?");
            //escribir aqui el codigo necesario para eliminar zona
        }

        $(document).ready(function () {
            $('#example').DataTable();
        });



        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("example");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


</body>

</html>
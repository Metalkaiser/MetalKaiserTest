<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--Website made by: metalkaiserpolanco@gmail.com-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CAOL - Controle de Atividades Online - Agence Interativa</title>
        <meta name="description" content="Website made by: metalkaiserpolanco@gmail.com">
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{ asset('js/script.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body class="my-3 mx-3">
        <!--Website made by: metalkaiserpolanco@gmail.com-->
        <div class="row top-row shadow">
            <div class="col-2 text-center">
                <img src="https://metalkaisertest.000webhostapp.com/inc/fig.gif">
            </div>
            <div class="dropdown-divider col-8 my-auto"></div>
            <img class="col-2" src="http://127.0.0.1:8000/inc/logo.gif">
        </div>
        <div class="row">
        <div class="col-1 bg-primary py-4 shadow">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark">
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/001-home.png">
                    </div>
                    <p>Agence</p>
                    </a>
                        <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                            Undefined
                        </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/046-proj.png">
                    </div>
                    <p>Projetos</p>
                    </a>
                        <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                            Undefined
                        </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/006-admin.png">
                    </div>
                    <p>Administrativo</p>
                    </a>
                        <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                            Undefined
                        </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/115-comercial.png">
                        </div>
                    <p>Comercial</p>
                        </a>
                            <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                                <button class="btn btn-primary mb-1">Por Consultor</button>
                                <button class="btn">Por Cliente</button>
                            </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/175-finance.png">
                    </div>
                    <p>Financeiro</p>
                    </a>
                        <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                            Undefined
                        </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="btn-group dropright">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/119-user.png">
                    </div>
                    <p>Usuário</p>
                    </a>
                        <div class="dropdown-menu text-center" style="background-color: rgba(255,255,255,0.5);">
                            Undefined
                        </div>
                    </div>
                </li>
                <p class="dropdown-divider"></p>
                <li class="text-center">
                    <div>
                        <img src="http://127.0.0.1:8000/inc/272-cross.png">
                    </div>
                    <p>Sair</p>
                </li>
            </ul>
        </div>
        <div class="col-11">
            <p class="dropdown-divider"></p>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3 text-right my-auto">Período:</div>
                <div class="col-4 row">
                    <div class="col-4 mb-2">
                    <select class="periodo mb-2">
                        <option value="01">Jan</option>
                        <option value="02">Fev</option>
                        <option value="03">Mar</option>
                        <option value="04">Abr</option>
                        <option value="05">Mai</option>
                        <option value="06">Jun</option>
                        <option value="07" selected="selected">Jul</option>
                        <option value="08">Ago</option>
                        <option value="09">Set</option>
                        <option value="10">Out</option>
                        <option value="11">Nov</option>
                        <option value="12">Dez</option>
                    </select>
                    <select class="periodo">
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007" selected="selected">2007</option>
                    </select>
                    </div>
                    <div class="col-3 my-auto">
                        <span class="mx-3">a</span>
                    </div>
                    <div class="col-4">
                    <select class="periodo mb-2">
                        <option value="01">Jan</option>
                        <option value="02">Fev</option>
                        <option value="03">Mar</option>
                        <option value="04">Abr</option>
                        <option value="05">Mai</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Ago</option>
                        <option value="09" selected="selected">Set</option>
                        <option value="10">Out</option>
                        <option value="11">Nov</option>
                        <option value="12">Dez</option>
                    </select>
                    <select class="periodo">
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007" selected="selected">2007</option>
                    </select>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <p class="dropdown-divider"></p>
            <div class="row">
                <div class="col-5 card shadow">
                    <div class="card-header text-center">
                        <strong>Consultores</strong>
                    </div>
                    <div class="mr-3 text-center card-body">
                        <select multiple size="8" id="list1" class="shadow">
                        @php
                        foreach($listconsultor as $key => $value){
                            echo "<option value='" . $value->co_usuario . "'>";
                            echo $value->no_usuario . "</option>";
                        }
                        @endphp
                        </select>
                    </div>
                </div>
                <div class="col-1 text-center">
                    <select style="display: none;" multiple size="8" style="width: 90%" id="list2" disabled></select>
                </div>
                <div class="col-5 card shadow">
                    <div class="card-header text-center">
                        <strong>Acciones</strong>
                    </div>
                    <div class="my-auto text-center card-body">
                        <button class="my-1 btn btn-primary"><img class="mr-1" src="http://127.0.0.1:8000/inc/039-file-text2.png"><span>Relatorio</span></button>
                        <br>
                        <button class="my-1 btn btn-primary"><img class="mr-1" src="http://127.0.0.1:8000/inc/156-stats-dots.png"><span>Gráfico</span></button>
                        <br>
                        <button class="my-1 btn btn-primary"><img class="mr-1" src="http://127.0.0.1:8000/inc/155-pie-chart.png"><span>Pizza</span></button>
                    </div>
                </div>
            </div>
            <p class="dropdown-divider"></p>
        </div>
        </div>
        <div class="text-center">
            <p style="color:#eae5e5;">Website made by: metalkaiserpolanco@gmail.com</p>
        </div>
        <p class="dropdown-divider"></p>
        <div id="results">
        </div>
        <div class="text-center">
            <p style="color:#eae5e5;">Website made by: metalkaiserpolanco@gmail.com</p>
        </div>
    </body>
</html>
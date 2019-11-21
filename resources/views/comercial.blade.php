<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CAOL - Controle de Atividades Online - Agence Interativa</title>
        <meta name="description" content="Website made by: metalkaiserpolanco@gmail.com">
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body class="my-3 mx-3">
        <!--Website made by: metalkaiserpolanco@gmail.com-->
        <div>
            <div class="row">
                <div class="col-2 text-center">
                    <img src="http://127.0.0.1:8000/inc/fig.gif">
                </div>
                <p class="dropdown-divider col-8"></p>
                <img class="col-2" src="http://127.0.0.1:8000/inc/logo.gif">
            </div>
            <div class="row">
                <div class="col-7 row">
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/001-home.png">
                        </div>
                        <p><small>Agence</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/046-proj.png">
                        </div>
                        <p><small>Projetos</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/006-admin.png">
                        </div>
                        <p><small>Administrativo</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/115-comercial.png">
                        </div>
                        <p><small>Comercial</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/175-finance.png">
                        </div>
                        <p><small>Financeiro</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/119-user.png">
                        </div>
                        <p><small>Usuário</small></p>
                    </div>
                    <div class="col text-center">
                        <div>
                            <img src="http://127.0.0.1:8000/inc/272-cross.png">
                        </div>
                        <p><small>Sair</small></p>
                    </div>
                </div>
                <div class="col-5"></div>
            </div>
            <p class="dropdown-divider"></p>
            <div class="row my-2">
                <div class="col-3 text-center">
                    <button class="btn btn-primary">Por Consultor</button>
                    <button class="btn">Por Cliente</button>
                </div>
                <div class="col-9"></div>
            </div>
            <p class="dropdown-divider"></p>
            <div class="row">
                <div class="col-2 text-right">Período</div>
                <div class="col-8">
                    <select class="periodo">
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
                    <span class="mx-3">a</span>
                    <select class="periodo">
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
                <div class="col-2"></div>
            </div>
            <p class="dropdown-divider"></p>
            <div class="row">
                <div class="col-2 my-auto text-right">
                    Consultores
                </div>
                <div class="col-3 mr-3 text-center">
                    <select multiple size="8" style="width: 90%" id="list1">
                    @php
                    foreach($listconsultor as $key => $value){
                        echo "<option value='" . $value->co_usuario . "'>";
                        echo $value->no_usuario . "</option>";
                    }
                    @endphp
                    </select>
                </div>
                <div class="col-1 my-auto text-center">
                    <button class="btn btn-pass btn-secondary mb-1">>></button>
                    <br>
                    <button class="btn btn-pass btn-secondary"><<</button>
                </div>
                <div class="col-3 text-center">
                    <select multiple size="8" style="width: 90%" id="list2"></select>
                </div>
                <div class="col-2 my-auto text-center">
                    <button class="my-1 btn"><img class="mr-1" src="http://127.0.0.1:8000/inc/039-file-text2.png">Relatorio</button>
                    <br>
                    <button class="my-1 btn"><img class="mr-1" src="http://127.0.0.1:8000/inc/156-stats-dots.png">Gráfico</button>
                    <br>
                    <button class="my-1 btn"><img class="mr-1" src="http://127.0.0.1:8000/inc/155-pie-chart.png">Pizza</button>
                </div>
            </div>
            <p class="dropdown-divider"></p>
            <div id="results">
            </div>
        </div>
        <div class="text-center">
            <p style="color:#eae5e5;">Website made by: metalkaiserpolanco@gmail.com</p>
        </div>
    </body>
</html>

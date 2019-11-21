<?php
//Website made by: metalkaiserpolanco@gmail.com

namespace App\Http\Controllers;

use App\caol;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class CaolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listconsultor = \DB::table('cao_usuario')
            ->join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')
            ->where([
                ['co_sistema', '=', 1],
                ['in_ativo', '=', 'S'],
            ])
            ->whereIn('co_tipo_usuario', ['0','1','2'])
            ->select('cao_usuario.co_usuario', 'cao_usuario.no_usuario')
            ->get();
        return view('comercial', compact('listconsultor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $queryArr = $request['queryArr'];
            $startPeriod = $request['startPeriod'];
            $endPeriod = $request['endPeriod'];
            $reqlen = count($queryArr);
            for ($i=0; $i < $reqlen; $i++) { 
                $listfatura[$i] = \DB::table('cao_os')
                    ->join('cao_fatura', 'cao_os.co_os', '=', 'cao_fatura.co_os')
                    ->where([
                        ['co_usuario', '=', $queryArr[$i]],
                        ['data_emissao', '>=', $startPeriod],
                        ['data_emissao', '<=', $endPeriod],
                    ])
                    ->select('cao_fatura.total', 'cao_os.co_usuario', 'cao_fatura.data_emissao', 'cao_fatura.valor', 'cao_fatura.comissao_cn', 'cao_fatura.total_imp_inc')
                    ->get();
                $listcost[$i] = \DB::table('cao_salario')->where('co_usuario', '=', $queryArr[$i])->get('brut_salario');
                $relatorio[$i][0] = $listfatura[$i];
                $relatorio[$i][1] = $listcost[$i];
            }
            return response()->json(
                $relatorio
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function grafico(Request $request)
    {
        if ($request->ajax()) {
            //Lavachart graph
            $lava = new Lavacharts;
            $names = $request["nameArr"];
            $months = $request["test"];
            $totalgrafico = $request["totalgrafico"];
            $customedio = (float)$request["customedio"];
            $testvar = $this->columns($months, count($names), $customedio);
            $grafico = $lava->DataTable();
            $grafico->addDateColumn('Periodo');
            for ($y=0; $y < count($names); $y++) { 
                $grafico->addNumberColumn($names[$y]);
            }
            $grafico->addNumberColumn('Custo medio');
            for ($x=0; $x < count($names); $x++) { 
                for ($c=0; $c < count($months); $c++) {
                    $grafico->addRow([$months[$c], $testvar]);
                }
            }
            $lava->ComboChart('Grafico',$grafico, [
                    'title' => 'Company Performance',
                    'titleTextStyle' => [
                    'color'    => 'rgb(123, 65, 89)',
                    'fontSize' => 16
                ],
                'legend' => [
                    'position' => 'in'
                ],
                'seriesType' => 'bars',
                'series' => [
                    count($names) => ['type' => 'line']
                ]
            ]);
            return response()->json(
                $lava->render('ComboChart', 'Grafico', 'results')
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\caol  $caol
     * @return \Illuminate\Http\Response
     */
    public function pizza(Request $request)
    {
        if ($request->ajax()) {
            //Lavachart graph
            $lava = new Lavacharts;
            $pizza = $lava->DataTable();
            $pizza->addStringColumn('Desempenho')
            ->addNumberColumn('ganancia');
            for ($x=0; $x < count($request["pizzaArr"]); $x++) {
                $pizza->addRow([$request["nameArr"][$x], (float)$request["pizzaArr"][$x]]);
            }
            $lava->PieChart('Pizza',$pizza, [
                'title' => 'Pizza | Receita líquida',
                'is3D' => 'false',
            ]);
            return response()->json(
                $lava->render('PieChart','Pizza','results')
            );
        }
    }

    public function columns($months, $column, $customedio)
    {
        $rowString = "";
        for ($i=0; $i < $column; $i++) { 
            $rowString = $rowString . "(float)consultor[" . $i . "]["."\$c], ";
        }
        $rowString = $rowString . $customedio;
        return $rowString;
    }
}

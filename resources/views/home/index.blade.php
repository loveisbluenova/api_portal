@extends('layouts.app')

@section('title', 'Product Maintenance')

@section('styles')
<link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/clockpicker/clockpicker.css') !!}">
<link href="{!! asset('css/plugins/switchery/switchery.css') !!}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                     
                        <!--  -->
                         
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>SELECCIÓN DEL PRODUCTO A EDITAR</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form id="api-search" class="form-horizontal" action="/admin/searchable-api" method="GET">
                                    <input type="hidden" class="form-control" id="user_id" name = "rut" value="{{Auth::user()->rut}}">
                                    <div class="form-group">
                                        
                                        <label class="col-lg-3 control-label">Código unificado Holding Dimerc</label>
                                        <div class="col-lg-3"><input type="text" class="form-control searchable-input" id="codpro" name="codpro" value="{{$form_data[0]}}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group"><label class="col-lg-3 control-label">Código interno Dimerc</label>

                                        <div class="col-lg-3"><input type="text" class="form-control searchable-input" id="coduni" name="coduni"  value="{{$form_data[1]}}"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-3 control-label">Código interno proveedor </label>

                                        <div class="col-lg-3"><input type="text" class="form-control searchable-input" id="codprv" name="codprv"  value="{{$form_data[3]}}"> 
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-3 control-label">Descripción del Producto</label>

                                        <div class="col-lg-3"><input type="text" class="form-control"  value="{{$form_data[2]}}"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <input type="submit" class="btn btn-primary" value="Enviar">
                                            <a href="/admin" class="btn btn-danger">Reset</a>
                                        </div>   
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                        @if($form_data[4] == 200)
                            {{ Form::open(['route' => 'admin.save_data', 'class' => 'form-horizontal', 'id' => 'data_input_field']) }}
                                <input type="hidden" class="form-control" name="codpro" value="{{$form_data[0]}}">
                                <input type="hidden" class="form-control" name="coduni"  value="{{$form_data[1]}}">
                                <input type="hidden" class="form-control" name="codprv"  value="{{$form_data[3]}}">
                                <input type="hidden" class="form-control" name="prod_name" value="{{$form_data[2]}}">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>ESPECIFICACIÓN DE UNIDADES LOGISTICAS / UNIDADES DE MEDIDA</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover" style="width: 1500px; max-width: unset;">
                                            <thead>
                                                <tr>
                                                    <th>Manejo Unidades Logisticas</th>
                                                    <th>UNIDADES POR…</th>
                                                    <th>Codificación Internacional</th>
                                                    <th>Peso Neto (kg.)</th>
                                                    <th>Peso Bruto (Kg.)</th>
                                                    <th>LARGO (cm.)</th>
                                                    <th>Ancho (cm.)</th>
                                                    <th>Alto (cm.)</th>
                                                    <th>Volumen (cm3)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-group row">
                                                        <div class="col-lg-2"><input type="checkbox" class="form-check-input" name="base_pro" id="base_pro_check" checked disabled>
                                                            </div>
                                                        <label class="col-lg-10 control-label">Unidad de Medida Base (UMB)</label>

                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group row"><label class="col-lg-8 control-label">UMB/UMB</label>

                                                            <div class="col-lg-4"><input type="text" name="umb" id="umb" class="form-control" value="@if($product!=NULL){{$product->umb}}@endif">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group row"><label class="col-lg-4 control-label">EAN13</label>

                                                            <div class="col-lg-8"><input type="text" placeholder="No Code" class="form-control" id="ean" name="ean" value="@if($product!=NULL){{$product->ean13}}@endif"> 
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" id="net_weight_base_pro" name="net_weight_base_pro" class="form-control" min="0.001" max="30" step="0.001" value="@if($product!=NULL){{$product->net_weight_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" id="gross_weight_base_pro" class="form-control" name="gross_weight_base_pro" min="0.001" max="30" step="0.001"  value="@if($product!=NULL){{$product->gross_weight_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="long_base_pro" id="long_base_pro" min="0.1" max="100" step="0.1" value="@if($product!=NULL){{$product->long_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="width_base_pro" id="width_base_pro" min="0.1" max="100" step="0.1" value="@if($product!=NULL){{$product->width_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="height_base_pro" id="height_base_pro" min="0.1" max="100" step="0.1" value="@if($product!=NULL){{$product->height_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="volume_base_pro" id="volume_base_pro" min="0.1" max="1000000" step="0.1" value="@if($product!=NULL){{$product->volume_base_pro}}@endif"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-2"><input type="checkbox" class="form-check-input" name="manage_inner_pack" @if($product!=NULL && $product->manage_inner_pack) checked @endif> 
                                                            </div>

                                                        <label class="col-lg-10 control-label" >Maneja Inner Pack</label>

                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-8 control-label">UMB/INNER PACK</label>

                                                            <div class="col-lg-4"><input type="text" class="form-control" name="umb_inner_pack" id="umb_inner_pack" value="@if($product!=NULL){{$product->umb_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-4 control-label" >DUN14</label>

                                                            <div class="col-lg-8"><input type="text" class="form-control" name="dun_inner_pack" id="dun_inner_pack" value="@if($product!=NULL){{$product->dun_inner_pack}}@endif"> 
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="net_weight_inner_pack" id="net_weight_inner_pack" min="0.001" max="50" step="0.001" value="@if($product!=NULL){{$product->net_weight_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="gross_weight_inner_pack" id="gross_weight_inner_pack" min="0.001" max="50" step="0.001" value="@if($product!=NULL){{$product->gross_weight_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="long_inner_pack" id="long_inner_pack" min="0.1" max="500" step="0.1" value="@if($product!=NULL){{$product->long_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="width_inner_pack" id="width_inner_pack" min="0.1" max="500" step="0.1" value="@if($product!=NULL){{$product->width_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="height_inner_pack" id="height_inner_pack" min="0.1" max="500" step="0.1" value="@if($product!=NULL){{$product->height_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="volume_inner_pack" id="volume_inner_pack" min="0.1" max="5000000" step="0.1" value="@if($product!=NULL){{$product->volume_inner_pack}}@endif"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                        <div class="col-lg-2"><input type="checkbox" class="form-check-input" name="handle_master_box" @if($product!=NULL && $product->handle_master_box) checked @endif>
                                                            </div>
                                                        <label class="col-lg-10 control-label">Maneja Caja Master</label>

                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-8 control-label">UMB/CAJA MASTER</label>

                                                            <div class="col-lg-4"><input type="text" class="form-control" name="umb_manage_box" id="umb_manage_box" value="@if($product!=NULL){{$product->umb_manage_box}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-4 control-label">DUN14</label>

                                                            <div class="col-lg-8"><input type="text" class="form-control" name="dun_manage_box" id="dun_manage_box" value="@if($product!=NULL){{$product->dun_manage_box}}@endif"> 
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="net_weight_manage_box" id="net_weight_manage_box" min="0.001" max="60" step="0.001" value="@if($product!=NULL){{$product->net_weight_manage_box}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="gross_weight_manage_box" id="gross_weight_manage_box" min="0.001" max="60" step="0.001" value="@if($product!=NULL){{$product->gross_weight_manage_box}}@endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="long_manage_box" id="long_manage_box" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->long_manage_box}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="width_manage_box" id="width_manage_box" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->width_manage_box}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="height_manage_box" id="height_manage_box" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->height_manage_box}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="volume_manage_box" id="volume_manage_box" min="0.1" max="500000" step="0.1" value="@if($product!=NULL) {{$product->volume_manage_box}} @endif"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-2"><input type="checkbox" class="form-check-input" name="handle_layer" @if($product!=NULL && $product->handle_layer) checked @endif>
                                                            </div>
                                                            <label class="col-lg-10 control-label">Maneja Layer</label>

                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-8 control-label">UMB/LAYER</label>

                                                            <div class="col-lg-4"><input type="text" class="form-control" name="umb_layer" id="umb_layer" value="@if($product!=NULL) {{$product->umb_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-4 control-label">DUN14</label>

                                                            <div class="col-lg-8"><input type="text" class="form-control" name="dun_layer" id="dun_layer" value="@if($product!=NULL) {{$product->dun_layer}} @endif"> 
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="net_weight_layer" id="net_weight_layer" min="0.1" max="400" step="0.1" value="@if($product!=NULL) {{$product->net_weight_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="gross_weight_layer" id="gross_weight_layer" min="0.1" max="400" step="0.1" value="@if($product!=NULL) {{$product->gross_weight_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="long_layer" id="long_layer" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->long_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="width_layer" id="width_layer" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->width_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="height_layer" id="height_layer" min="0.1" max="150" step="0.1" value="@if($product!=NULL) {{$product->height_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="volume_layer" id="volume_layer" min="0.1" max="1000000" step="0.1" value="@if($product!=NULL) {{$product->volume_layer}} @endif"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">

                                                            <div class="col-lg-2"><input type="checkbox" class="form-check-input" name="handle_pallet" @if($product!=NULL && $product->handle_pallet) checked @endif>
                                                            </div>
                                                            <label class="col-lg-10 control-label">Maneja Pallet</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-8 control-label">UMB/PALLET</label>

                                                            <div class="col-lg-4"><input type="text" class="form-control" name="umb_pallet" id="umb_pallet" value="@if($product!=NULL) {{$product->umb_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group"><label class="col-lg-4 control-label">DUN14</label>

                                                            <div class="col-lg-8"><input type="text" class="form-control" name="dun_pallet" id="dun_pallet" value="@if($product!=NULL) {{$product->dun_pallet}} @endif"> 
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="net_weight_pallet" id="net_weight_pallet" min="0.1" max="2500" step="0.1" value="@if($product!=NULL) {{$product->net_weight_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="gross_weight_pallet" id="gross_weight_pallet" min="0.1" max="2500" step="0.1" value="@if($product!=NULL) {{$product->gross_weight_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="long_pallet" id="long_pallet" min="0.1" max="180" step="0.1" value="@if($product!=NULL) {{$product->long_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="width_pallet" id="width_pallet" min="0.1" max="180" step="0.1" value="@if($product!=NULL) {{$product->width_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="height_pallet" id="height_pallet" min="0.1" max="180" step="0.1" value="@if($product!=NULL) {{$product->height_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-lg-12"><input type="number" class="form-control" name="volume_pallet" id="volume_pallet" min="0.1" max="1500000" step="0.1" value="@if($product!=NULL) {{$product->volume_pallet}} @endif"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>PARÁMETROS DE ABASTECIMIENTO</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Unidad de Medida de Pedido (UMP)</label>

                                            <div class="col-lg-3"> 
                                                <select class="form-control" name="ump">
                                                    <option value="pb" @if($product!=NULL && $product->ump == 'pb') selected @endif>PB</option>
                                                    <option value="inner_pack" @if($product!=NULL && $product->ump == 'inner_pack') selected @endif>INNER PACK</option>
                                                    <option value="master_box" @if($product!=NULL && $product->ump == 'master_box') selected @endif>CAJA MASTER</option>
                                                    <option value="layer" @if($product!=NULL && $product->ump == 'layer') selected @endif>LAYER</option>
                                                    <option value="pallet" @if($product!=NULL && $product->ump == 'pallet') selected @endif>PALLET</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Grupo de Transporte</label>

                                            <div class="col-lg-3"><input type="text" class="form-control" name="transport_group" value="@if($product!=NULL){{$product->transport_group}}@endif"></div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Lead time</label>

                                            <div class="col-lg-3"><input type="text" class="form-control" name="lead_time" value="@if($product!=NULL){{$product->lead_time}}@endif"> 
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Horario de Corte</label>
                                            <div class="col-lg-3">
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                    <input type="text" class="form-control" name="main_supplier" value="@if($product!=NULL){{$product->main_supplier}}@endif"/>
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-clock-o"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Semana Laboral</label>

                                            <div class="col-lg-3">
                                                <select class="form-control" name="workweek">
                                                    <option value="L-V" @if($product!=NULL && $product->workweek == 'L-V') selected @endif>L-V</option>
                                                    <option value="L-S" @if($product!=NULL && $product->workweek == 'L-S') selected @endif>L-S</option>
                                                    <option value="V-D" @if($product!=NULL && $product->workweek == 'L-D') selected @endif>L-D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>ALMACENAMIENTO</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="form-group"><label class="col-lg-3 control-label">Producto con Vencimiento</label>

                                            <div class="col-lg-1">
                                                <input type="checkbox" class="js-switch" name="product_with_expiration" id="product_with_expiration" @if($product!=NULL && $product->product_with_expiration) checked @endif />
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Almacenamiento especial</label>

                                            <div class="col-lg-4">
                                                <select class="form-control" name="special_storage_of_product">
                                                    <option value="1" @if($product!=NULL && $product->special_storage_of_product == 1) selected @endif>Sustancia NO peligrosa</option>
                                                    <option value="2" @if($product!=NULL && $product->special_storage_of_product == 2) selected @endif>Sustancias y objetos explosivos</option>
                                                    <option value="3" @if($product!=NULL && $product->special_storage_of_product == 3) selected @endif>Gases comprimidos, licuados, disueltos a presión o criogénicos </option>
                                                    <option value="4" @if($product!=NULL && $product->special_storage_of_product == 4) selected @endif>Líquidos inflamables</option>
                                                    <option value="5" @if($product!=NULL && $product->special_storage_of_product == 5) selected @endif>Sólidos inflamables</option>
                                                    <option value="6" @if($product!=NULL && $product->special_storage_of_product == 6) selected @endif>Sustancias comburentes, peróxidos orgánicos</option>
                                                    <option value="7" @if($product!=NULL && $product->special_storage_of_product == 7) selected @endif>Sustancias tóxicas e infecciosas</option>
                                                    <option value="8" @if($product!=NULL && $product->special_storage_of_product == 8) selected @endif>Sustancias radiactivas</option>
                                                    <option value="9" @if($product!=NULL && $product->special_storage_of_product == 9) selected @endif>Sustancias corrosivas </option>
                                                    <option value="10" @if($product!=NULL && $product->special_storage_of_product == 10) selected @endif>Sustancias peligrosas varias</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Exposicion al sol</label>

                                            <div class="col-lg-1"><input type="checkbox" class="js-switch" name="sun_exposure" @if($product!=NULL && $product->sun_exposure) checked @endif> 
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Temperarura</label>

                                            <div class="col-lg-3"><input type="text" class="form-control" name="temperature" value="@if($product!=NULL){{$product->temperature}}@endif"></div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Humedad</label>

                                            <div class="col-lg-1"><input type="checkbox" class="js-switch" name="humidity" @if($product!=NULL && $product->humidity) checked @endif> 
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-lg-3 control-label">Vida Útil del producto</label>

                                            <div class="col-lg-3"><input type="text" class="form-control" id="lifetime_product_base" name="lifetime_product_base" value="@if($product!=NULL){{$product->lifetime_product_base}}@endif"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox float-e-margins">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/plugins/validate/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/plugins/clockpicker/clockpicker.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/plugins/switchery/switchery.js') !!}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            elems.forEach(function(html) {
                var switchery = new Switchery(html, { color: '#1AB394', size: 'switchery-small' });
            });

            $.validator.addMethod("greaterThan",
                function (value, element, param) {
                    var $otherElement = $(param);
                    return parseFloat(value, 10) > parseFloat($otherElement.val(), 10);
                }
            );

            $.validator.addMethod("checkIdentify",
                function(value, element, param) {
                    var count = 0;
                    if(value == $('#ean').val()) count ++;
                    if(value == $('#dun_inner_pack').val()) count ++;
                    if(value == $('#dun_manage_box').val()) count ++;
                    if(value == $('#dun_layer').val()) count ++;
                    if(value == $('#dun_pallet').val()) count ++;
                    return count == 1; 
                }, "This field must be unique."
            );

            $.validator.addMethod("checkRequire",
                function(value, element, param) {
                    if($('#coduni').val().length != 0 || $('#codpro').val().length !== 0 || $('#codprv').val().length !== 0) return true;
                    return false;
                }, "This field must be required."
            );

            $("#api-search").validate({
                rules: {
                    coduni: {
                        checkRequire: true
                    },
                    codpro: {
                        checkRequire: true
                    },
                    codprv: {
                        checkRequire: true
                    }
                }
            });

            $("#data_input_field").validate({
                rules: {
                    umb: {
                        required: true,
                        number: true,
                    },
                    ean: {
                        required: true,
                        number: true,
                        maxlength: 14,
                        checkIdentify: true,
                    },
                    net_weight_base_pro: {
                        required: true,
                        number: true,
                    },
                    lead_time: {
                        required: true,
                        number: true,
                    },
                    gross_weight_base_pro: {
                        required: true,
                        greaterThan: "#net_weight_base_pro"
                    },
                    ////////////////////////////////////////////
                    dun_inner_pack: {
                        required: true,
                        checkIdentify: true,
                    },
                    umb_inner_pack: {
                        greaterThan: "#umb" 
                    },
                    net_weight_inner_pack: {
                        greaterThan: "#net_weight_base_pro"
                    },
                    gross_weight_inner_pack: {
                        greaterThan: "#gross_weight_base_pro"
                    },
                    long_inner_pack: {
                        greaterThan: "#long_base_pro"
                    },
                    width_inner_pack: {
                        greaterThan: "#width_base_pro"
                    },
                    height_inner_pack: {
                        greaterThan: "#height_base_pro"
                    },
                    volume_inner_pack: {
                        greaterThan: "#volume_base_pro"
                    },
                    //////////////////////////////////////////
                    dun_manage_box: {
                        required: true,
                        checkIdentify: true,
                    },
                    umb_manage_box: {
                        greaterThan: "#umb_inner_pack" 
                    },
                    net_weight_manage_box: {
                        greaterThan: "#net_weight_inner_pack"
                    },
                    gross_weight_manage_box: {
                        greaterThan: "#gross_weight_inner_pack"
                    },
                    long_manage_box: {
                        greaterThan: "#long_inner_pack"
                    },
                    width_manage_box: {
                        greaterThan: "#width_inner_pack"
                    },
                    height_manage_box: {
                        greaterThan: "#height_inner_pack"
                    },
                    volume_manage_box: {
                        greaterThan: "#volume_inner_pack"
                    },
                    ///////////////////////////////////////
                    dun_layer: {
                        required: true,
                        checkIdentify: true,
                    },
                    umb_layer: {
                        greaterThan: "#umb_manage_box" 
                    },
                    net_weight_layer: {
                        greaterThan: "#net_weight_manage_box"
                    },
                    gross_weight_layer: {
                        greaterThan: "#gross_weight_manage_box"
                    },
                    long_layer: {
                        greaterThan: "#long_manage_box"
                    },
                    width_layer: {
                        greaterThan: "#width_manage_box"
                    },
                    height_layer: {
                        greaterThan: "#height_manage_box"
                    },
                    volume_layer: {
                        greaterThan: "#volume_manage_box"
                    },
                    ////////////////////////////////////////////////
                    dun_pallet: {
                        required: true,
                        checkIdentify: true,
                    },
                    umb_pallet: {
                        greaterThan: "#umb_layer" 
                    },
                    net_weight_pallet: {
                        greaterThan: "#net_weight_layer"
                    },
                    gross_weight_pallet: {
                        greaterThan: "#gross_weight_layer"
                    },
                    long_pallet: {
                        greaterThan: "#long_layer"
                    },
                    width_pallet: {
                        greaterThan: "#width_layer"
                    },
                    height_pallet: {
                        greaterThan: "#height_layer"
                    },
                    volume_pallet: {
                        greaterThan: "#volume_layer"
                    },

                },
                messages: {
                    gross_weight_base_pro: {
                        greaterThan: "Must greater than net weight"
                    },
                    //////////////////////////////////////////
                    umb_inner_pack: {
                        greaterThan: "Must greater than UMB"
                    },
                    net_weight_inner_pack: {
                        greaterThan: "Must greater than base product net weight"
                    },
                    gross_weight_inner_pack: {
                        greaterThan: "Must greater than base product gross weight"
                    },
                    long_inner_pack: {
                        greaterThan: "Must greater than base product length"
                    },
                    width_inner_pack: {
                        greaterThan: "Must greater than base product width"
                    },
                    height_inner_pack: {
                        greaterThan: "Must greater than base product height"
                    },
                    volume_inner_pack: {
                        greaterThan: "Must greater than base product volume"
                    },
                    /////////////////////////////////////////////////
                    umb_manage_box: {
                        greaterThan: "Must greater than inner pack"
                    },
                    net_weight_manage_box: {
                        greaterThan: "Must greater than inner pack net weight"
                    },
                    gross_weight_manage_box: {
                        greaterThan: "Must greater than inner pack gross weight"
                    },
                    long_manage_box: {
                        greaterThan: "Must greater than inner pack length"
                    },
                    width_manage_box: {
                        greaterThan: "Must greater than inner pack width"
                    },
                    height_manage_box: {
                        greaterThan: "Must greater than inner pack height"
                    },
                    volume_manage_box: {
                        greaterThan: "Must greater than inner pack volume"
                    },
                    /////////////////////////////////////////////
                    umb_layer: {
                        greaterThan: "Must greater than master box"
                    },
                    net_weight_layer: {
                        greaterThan: "Must greater than master box net weight"
                    },
                    gross_weight_layer: {
                        greaterThan: "Must greater than master box gross weight"
                    },
                    long_layer: {
                        greaterThan: "Must greater than master box length"
                    },
                    width_layer: {
                        greaterThan: "Must greater than master box width"
                    },
                    height_layer: {
                        greaterThan: "Must greater than master box height"
                    },
                    volume_layer: {
                        greaterThan: "Must greater than master box volume"
                    },
                    ///////////////////////////////////////////////////////
                    umb_pallet: {
                        greaterThan: "Must greater than layer"
                    },
                    net_weight_pallet: {
                        greaterThan: "Must greater than layer net weight"
                    },
                    gross_weight_pallet: {
                        greaterThan: "Must greater than layer gross weight"
                    },
                    long_pallet: {
                        greaterThan: "Must greater than layer length"
                    },
                    width_pallet: {
                        greaterThan: "Must greater than layer width"
                    },
                    height_pallet: {
                        greaterThan: "Must greater than layer height"
                    },
                    volume_pallet: {
                        greaterThan: "Must greater than layer volume"
                    },
                }
            });
            
            if($("#product_with_expiration").prop('checked') == false)
            {
                $("#lifetime_product_base").prop('disabled',true);
            }
            else
            {
                $("#lifetime_product_base").prop('disabled',false);
            }
        });

        $('table .form-check-input').each(function(){
            if($(this).prop('checked') == false)
            {
                $('input', $(this).parent().parent().parent().parent()).prop('disabled',true);
                $(this).prop('disabled', false);
                
            }
            else
            {
                $('input', $(this).parent().parent().parent().parent()).prop('disabled',false);
            }

        });
        $('#base_pro_check').prop('disabled', true);

        $('table .form-check-input').change(function(){
            if($(this).prop('checked') == false)
            {
                $('input', $(this).parent().parent().parent().parent()).prop('disabled',true);
                $(this).prop('disabled', false);
            }
            else
            {
                $('input', $(this).parent().parent().parent().parent()).prop('disabled',false);
            }
        });

        $("#product_with_expiration").change(function(){
            if($(this).prop('checked') == false)
            {
                $("#lifetime_product_base").prop('disabled',true);
            }
            else
            {
                $("#lifetime_product_base").prop('disabled',false);
            }
        });

        $('.clockpicker').clockpicker();
    </script>

@endsection

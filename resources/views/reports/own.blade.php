@extends('layout.base')


@section('body')
    <div class="row">
        <div class="col"><h3>Собствени имоти</h3></div>

    </div>

    <form action="#" id="search_form" autocomplete="off" >
    <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Договор</label>
                    <input type="text" name="contract" class="form-control  "/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Номер на имот</label>
                    <input type="text" name="property" class="form-control  "/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Към дата</label>
                    <input type="text" name="date" class="form-control  "/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary">Търсене</button>
                </div>
            </div>

    </div>
    </form>
    <div class="row">
        <div class="col">
            <div class="col">
                <table id="due_table" class="table" data-url="{{route('reports.own')}}">
                    <tr class="table-heading">
                        <th>Номер на договор</th>
                        <th>Дата на закупуване</th>
                        <th>Площ на имота(дка)</th>
                        <th>Цена на имот</th>
                        <th>цена на декар</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    @parent
    <script type="text/javascript" src="{{mix('js/reports/own.js')}}"></script>
@endsection

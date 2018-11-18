@extends('layout.base')


@section('body')
    <div class="row">
        <div class="col"><h3>Дължими аренди</h3></div>

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
                    <label for="">Собтсвеник</label>
                    <input type="text" name="landlord" class="form-control  "/>
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
                <table id="due_table" class="table" data-url="{{route('reports.due')}}">
                    <tr class="table-heading">
                        <th>Номер на договор</th>
                        <th>Начална дата на договора</th>
                        <th>Крайна дата на договора</th>
                        <th>Номер на имот</th>
                        <th>Площ на имота(дка)</th>
                        <th>Собственик</th>
                        <th>Собственик идеална част (дка)</th>
                        <th>Дължима рента на собственика</th>
                        <th>Дължима рента за целият имот</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    @parent
    <script type="text/javascript" src="{{mix('js/reports/due.js')}}"></script>
@endsection

@extends('layout.base')

@section('body')
    <div class="row">
        <div class="col">
            <h3>Добавяне на имот</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{route('property.store')}}" id="properties_form"
                  data-landlords="{{route('landlord.index')}}">
                <div class="form-group">
                    <label for="number">Номер на имота</label>
                    <input type="text" name="number" class="form-control" required placeholder="Номер на имота"/>
                </div>
                <div class="form-group">
                    <label for="area">Площ</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">дка.</span>
                        </div>
                        <input type="text" name="area" class="form-control" required placeholder="Площ"/>

                    </div>
                </div>

                <div class="form-group" id="landlords_forms">
                    <button type="button" class="btn btn-primary btn-sm" id="add_landlord">Добави собственик</button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="save_property">
                        Запази
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script id="landlord_template" type="text/x-template">
            <div class="row mt-4">
                <div class="col-5">
                    <label for="landlords">Собственик</label>
                    <select name="landlords" class="form-control select2" required>
                        <option disabled selected>--- Изберете собственик --- </option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="shares">Дял</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="text" class="form-control" name="shares">

                    </div>
                </div>
                <div class="col-2">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-sm btn-danger btn-block">премахни</button>
                </div>
            </div>
    </script>
@endsection
@section('javascripts')
    @parent
    <script type="text/javascript" src="{{mix('js/property.js')}}"></script>
@endsection

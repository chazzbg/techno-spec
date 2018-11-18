@extends('layout.base')

@section('body')
<div class="row">
    <div class="col">
        <h3>Добавяне на договор</h3>
    </div>
</div>
    <div class="row">
        <div class="col">
            <form action="{{route('contract.store')}}" id="contract_form" data-properties="{{route('property.index')}}">
                <div class="form-group">
                    <label for="">Номер на договора</label>
                    <input type="text" name="number" class="form-control" required placeholder="Номер на договора">
                </div>
                <div class="form-group">
                    <label for="">Вид на договора</label>
                    <select name="type" class="form-control">
                        <option disabled selected>--- Изберете вид на договора ---</option>
                        <option value="{{ \App\Enum\ContractEnum::TYPE_RENT }}">Аренда</option>
                        <option value="{{ \App\Enum\ContractEnum::TYPE_OWN }}">Собствен</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Стойност на договора</label>
                    <input type="text" name="price" class="form-control" required placeholder="Стойност на договора">
                </div>
                <div class="form-group">
                    <label for="">Валидност от</label>
                    <input type="text" name="valid_from" class="form-control" required placeholder="Начална дата">
                </div>
                <div class="form-group">
                    <label for="">Валидност до:</label>
                    <input type="text" name="valid_to" class="form-control" required placeholder="Крайна дата">
                </div>
                <div class="form-group">
                    <label for="">Имоти</label>
                    <select id="properties_select" name="properties[]" class="form-control select2 properties" multiple>
                        <option disabled>--- Изберете имоти ---</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Запази</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('javascripts')
    @parent
    <script type="text/javascript" src="{{mix('js/contract.js')}}"></script>
@endsection

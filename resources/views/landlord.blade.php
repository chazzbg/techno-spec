@extends('layout.base')

@section('body')
    <div class="row">
        <div class="col">
            <h3>Добавяне на Арендодател</h3>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('landlord.store') }}" id="landlord_form">
                <div class="form-group">
                    <label for="firstname">Име</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Име" required/>
                </div>
                <div class="form-group">
                    <label for="lastname">Фамилия</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required/>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" name="phone" placeholder="Телефон" required/>
                </div>
                <div class="form-group">
                    <label for="egn">ЕГН</label>
                    <input type="text" class="form-control" name="egn" placeholder="ЕГН" required/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Запази
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascripts')
    @parent
    <script type="text/javascript" src="{{mix('js/landlord.js')}}"></script>
@endsection

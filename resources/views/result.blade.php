@extends('product')

@section('content')
    <div class="alert alert-success mb-4">
        Расчет успешно выполнен
    </div>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <h2 class="h5 mb-0">Результат расчета</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Продукт:</th>
                    <td>{{ $result['product'] }}</td>
                </tr>
                <tr>
                    <th>Базовая цена:</th>
                    <td>{{ number_format($result['base_price'], 2) }} EUR</td>
                </tr>
                <tr>
                    <th>Страна:</th>
                    <td>{{ $result['country'] }}</td>
                </tr>
                <tr>
                    <th>Ставка налога:</th>
                    <td>{{ $result['tax_rate'] }}%</td>
                </tr>
                <tr>
                    <th>Сумма налога:</th>
                    <td>{{ number_format($result['tax_amount'], 2) }} EUR</td>
                </tr>
                <tr class="table-success">
                    <th>Итоговая цена:</th>
                    <td class="fw-bold">{{ number_format($result['total_price'], 2) }} EUR</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('index') }}" class="btn btn-primary">Новый расчет</a>
@endsection
{{-- @foreach ($cartData as $u)
  {{ $u->user_id }}
    
@endforeach --}}


@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <table class="table table-condensed">
                <tr>
                <td>Total Product : {{$productCount }}</td>    
                </tr>
                <tr>
                    <td>Tax : 14%</td>
                    </tr>

                <tr>
                <td>Total sum : {{ $totalSum}}</td>
                </tr>
                
                <tr>
                    <?php  $tax=$totalSum * 0.14;
                        $total=$totalSum + $tax; 
                    
                    ?>
                    <td>Total sum after tax :{{ $total }}</td>
                </tr>
                <tr>
                    <td>Delivery charges : 170 </td>
                </tr>
                <tr>
                    <td><span style="color:green;font-weight:bold">Total sum after tax :{{ $total + 170 }}</span></td>

                </tr>
            </table>
            

        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <form method="POST" action="/submit/order">
                @csrf
                <input type="text" name="total_sum" value="{{ $total + 170 }}" hidden>
                <label>Payment Style</label><br><br>
                <input type="radio" name="payment" value="on delivery"><span> Delivery on cash</span><br>
                <input type="radio" name="payment" value="online"><span> online</span><br><br>
                <input type="submit" value="submit" class="btn btn-dark">

            </form>
        </div>

    </div>
</div>


@endsection
<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="search-box container" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        <div class="row">
            <p class="fs-5 text-center">Pemesanan</p>
        </div>
        <div class="row">
            <div class="col">
                <p style="font-size: 16px">Booking ID: {{$pemesanan_id}}</p>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <p style="font-size: 21px">Rp. {{Session::get('harga')['total']}} </p>
            </div>
        </div>
    </div>
    <div class="search-box container" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        <p class="text-center fs-4 mb-0">Kartu Kredit/Debit</p>
        <form method="POST" action="{{route('home.finalized')}}">
            @csrf
            @method('PUT')
            @php
                $nomorKartu = '';
            @endphp
            <input type="hidden" name="pemesanan_id" value="{{$pemesanan_id}}">
            <input type="hidden" name="metode_pembayaran" value="1">
            <input type="hidden" name="referensi_pembayaran" value="">
            <div class="container mt-4 mb-5">
                <div class="row mb-2">
                    <div class="col">
                        <label for="nomorKartu">Nomor Kartu</label>
                        <br>
                        <input type="text" name="nomorKartu" id="nomorKartu" class="input-text" maxlength="16">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="expiryDate">Expiry Date</label>
                        <br>
                        <input type="text" name="expiryDate" id="expiryDate" class="input-text" maxlength="5" style="width: 80px">
                    </div>
                    <div class="col">
                        <label for="CVV">CVV</label>
                        <br>
                        <input type="text" name="CVV" id="CVV" class="input-text" maxlength="3" style="width: 80px">
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="button text-center" style="width: 240px">Bayar</button>
            </div>
        </form>
    </div>
</body>
</html>
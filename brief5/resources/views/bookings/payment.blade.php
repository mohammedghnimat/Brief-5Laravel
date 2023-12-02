@extends('main.layouts')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h2 class="mb-0">Order Summary</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td id="vat" class='thin dense'>{{$newBooking->start_date}}</td>
                                <td id="vat" class='thin dense'>{{$newBooking->end_date}}</td>
                                <td  id="total" class='thin dense'>{{$newBooking->total_price}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div><h3> Thank you for choosing us!<br> We hope you have a nice stay! </h3></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Payment Information</h2>
                    </div>
                    <div class="card-body">
                        <img src='https://logowik.com/content/uploads/images/visa-new-20215093.jpg'
                            height='80' class='credit-card-image' id='credit-card-image'></img>
                        <form>
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input class='form-control' type="number" id="cardNumber" oninput="validateCardNumber()"
                                    maxlength="16" required>
                                <span id="digitsLeft"></span>
                            </div>
                            <div class="form-group">
                                <label for="cardHolder">Card Holder</label>
                                <input class='form-control' type="text" id="cardHolder" oninput="validateCardHolder()"
                                    required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="date">Expires</label>
                                    <input class='form-control' type="number" id="date" oninput="validateDate()"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvc">CVC</label>
                                    <input class='form-control' type="number" id="cvc" oninput="validateCVC()"
                                        required>
                                </div>
                            </div>
                            <div id="validation"></div>
                            <button class='btn btn-primary btn-block' onclick="validateAndConfirmCheckout()">Confirm
                                Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script>
        function validateCardNumber() {
    var cardNumber = document.getElementById("cardNumber").value;
    var isValidCardNumber = /^\d{16}$/.test(cardNumber);
    displayValidationMessage("Card number must be 16 digits and contain only numbers.", isValidCardNumber);

    // Show how many digits are left
    var digitsLeft = 16 - cardNumber.length;
    var digitsLeftSpan = document.getElementById("digitsLeft");
    digitsLeftSpan.innerText = digitsLeft > 0 ? digitsLeft + " digits left" : "";
}

function validateCardHolder() {
    var cardHolder = document.getElementById("cardHolder").value;
    var isValidCardHolder = /^[a-zA-Z\s]+$/.test(cardHolder);
    displayValidationMessage("Card holder must contain only letters.", isValidCardHolder);
}

function validateDate() {
    var date = document.getElementById("date").value;
    var isValidDate = /^\d{4}$/.test(date);
    displayValidationMessage("Expiry date must be 4 digits (MMYY).", isValidDate);
}

function validateCVC() {
    var cvc = document.getElementById("cvc").value;
    var isValidCVC = /^\d{3}$/.test(cvc);
    displayValidationMessage("CVC must be 3 digits.", isValidCVC);
}

function displayValidationMessage(message, isValid) {
    var validationDiv = document.getElementById("validation");
    validationDiv.innerText = isValid ? "" : message;
}

function validateAndConfirmCheckout() {
    var cardNumber = document.getElementById("cardNumber").value;
    var cardHolder = document.getElementById("cardHolder").value;
    var date = document.getElementById("date").value;
    var cvc = document.getElementById("cvc").value;

    if (!cardNumber || !cardHolder || !date || !cvc) {
        alert("Please fill out all fields.");
        return;
    }

    validateCardNumber();
    validateCardHolder();
    validateDate();
    validateCVC();

    // Confirm checkout only if all validations pass
    var validationDiv = document.getElementById("validation");
    if (validationDiv.innerText === "") {
        validationDiv.innerText = "Checkout confirmed!";
        confirmCheckout();
    }
}

var checkoutUrl = "{{ route('properties.index') }}";
    function confirmCheckout() {
        // Add your logic here to confirm the checkout
        alert("Checkout confirmed!");
        window.location.href=checkoutUrl;
    }
</script>

@endsection
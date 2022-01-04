<img src="https://www.investopedia.com/thmb/E59aEsxnHa19WWk0PHjQPqWRzeQ=/2121x1414/filters:fill(auto,1)/GettyImages-876199432-f69ab426405a4bd296ec0bc18feba074.jpg"
    alt="" height="500" style="width: 100%">

<center>
    <h1>Email For Changing Passwords from <i> {{ env('APP_NAME') }} </i> </h1>
</center>
<hr>
<hr>
<br><br>

<p>
    Dear Admin this mail is about an OTP for changing your website {{ env('APP_NAME') }} password. This is the 6 digit
    One Time Password (OTP) => {{ $theotp }} <br>
    This OTP will be validate only for next 15 minutes.
    <br>
    <i> You can skip this mail if it's not you trying. </i>

    <br><br><br>
</p>

<hr>
<hr>

<h3>
    <b>
        THANKS,
        <br>
        {{ env('APP_NAME') }}
    </b>
</h3>

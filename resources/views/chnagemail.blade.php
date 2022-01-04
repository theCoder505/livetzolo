<img src="https://img.freepik.com/free-vector/man-look-graphic-chart-business-analytics-concept-big-data-processing-icon_39422-761.jpg?size=626&ext=jpg"
    alt="" height="500" style="width: 100%">

<center>
    <h1>Email For Changing "Admin Email" of <i> {{ env('APP_NAME') }} </i> </h1>
</center>
<hr>
<hr>
<br><br>

<p>
    Dear Admin this mail is about an OTP for changing your website {{ env('APP_NAME') }} Email. This is the 6 digit
    One Time Password (OTP): {{ $theotp }} <br>
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

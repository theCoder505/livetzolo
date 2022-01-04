<center>
    <h1 class="font-weight-bold pt-4"> Create Custom Influencer Account </h1>
</center>


@if (session('msg'))
    <div class="alert {{ session('type') }} text-center">
        {{ session('msg') }}
    </div>
@endif


<div class="container">
    <div id="influencerDiv">

        <form action="/create-influencer" method="post">
            @csrf

            <div class="form-group">
                <label for="influencerName">Influencer Name</label>
                <input type="text" class="form-control" id="influencerName" name="infName">
            </div>
            <div class="form-group">
                <label for="imgLink">Influencer Image Link</label>
                <input type="text" class="form-control" id="imgLink" name="imgLink">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="infMailAddr">
            </div>
            <div class="form-group">
                <label for="influencerLink">Influencer Link</label>
                <input type="text" class="form-control" id="influencerLink" name="infLink">
            </div>
            <div class="form-group">
                <label for="password">Influencer Password</label>
                <input type="password" class="form-control" id="password" name="infPassword">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" onclick="showpass()">Show Password
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>

        </form>
    </div>
</div>

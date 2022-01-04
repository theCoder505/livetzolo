<center>
    <h1 class="font-weight-bold pt-4"> Create New Advertisements </h1>
</center>

<p class="text-center">This Advvertise will be shown in the selected particular section of the website.</p>


@if (session('alertmsg'))
    <div class="alert text-center font-weight-bold alert-{{ session('type') }}">
        {{ session('alertmsg') }}
    </div>
@endif


<div class="container">
    <div id="influencerDiv" class="advertisements">

        <form action="/create-footer-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="companyname">Addvertisement Company Name</label>
                <input type="text" class="form-control" id="companyname" name="companyname">
            </div>
            <div class="form-group">
                <label for="imgLink">Advertisement Image Link</label>
                <input type="text" class="form-control" id="imgLink" name="imgLink">
            </div>
            <div class="form-group">
                <label for="imgLink">Or Advertisement Custom Image</label>
                <input type="file" id="imageFileName" accept="image/*" name="imageFileName">
            </div>
            <div class="form-group">
                <label for="redirectLink">Advertisement Redirect Link</label>
                <input type="text" class="form-control" id="redirectLink" name="redirectLink">
            </div>
            <div class="form-group">
                <label for="redirectLink">Select Adverting Page</label>
                <select class="form-control" name="typename">
                    <option value="otherpages" selected="">Other Page</option>
                    <option value="footeradd">Footer Adds</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cookietime">Advertisement Cookie Time In Hour [ Only for footer adds ]</label>
                <input type="number" class="form-control" id="cookietime" name="cookietime" value="12" min="1">
            </div>
            <button type="submit" class="btn btn-danger btn-block font-weight-bold">Upload Addvertisement</button>

        </form>
    </div>
</div>

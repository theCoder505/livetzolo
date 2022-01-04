<center>
    <h1 class="font-weight-bold pt-4"> About Us Text Control </h1>
</center>




<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <form action="/upload-about-text" method="post">
                @csrf
                <textarea id="textAbout" name="aboutVal" rows="10">{{ $about }}</textarea>
                <center>
                    <button class="btn btn-success px-5">UPLOAD/UPDATE</button>
                </center>
            </form>
        </div>
    </div>
</div>


<script>
    tinymce.init({
        selector: '#textAbout',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

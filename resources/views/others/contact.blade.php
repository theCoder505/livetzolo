<center>
    <h1 class="font-weight-bold pt-4 text-info"> Terms & Conditions Text Control </h1>
</center>





<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <form action="/upload-contact-text" method="post">
                @csrf
                <textarea id="contactUs" name="contactVal" rows="10">{{ $contact }}</textarea>
                <center>
                    <button class="btn btn-dark px-5">UPLOAD/UPDATE</button>
                </center>
            </form>
        </div>
    </div>
</div>


<script>
    tinymce.init({
        selector: '#contactUs',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

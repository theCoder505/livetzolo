<center>
    <h1 class="font-weight-bold pt-4"> Privacy Policy Text Control </h1>
</center>





<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <form action="/upload-privacy-text" method="post">
                @csrf
                <textarea id="privacyPolicy" name="privacyVal" rows="10">{{ $privacy }}</textarea>
                <center>
                    <button class="btn btn-danger px-5">UPLOAD/UPDATE</button>
                </center>
            </form>
        </div>
    </div>
</div>


<script>
    tinymce.init({
        selector: '#privacyPolicy',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>

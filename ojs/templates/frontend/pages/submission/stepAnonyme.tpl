<h2>{translate key="submission.anonymous.uploadTitle"}</h2>
<p>{translate key="submission.anonymous.uploadDescription"}</p>

<form id="anonymeUploadForm" class="pkp_form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="submissionId" value="{$submission->getId()}">
    <input type="file" name="anonymeFile" id="anonymeFile" required>
    <button type="submit">{translate key="common.upload"}</button>
</form>

<script>
    $('#anonymeUploadForm').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: '{url router=$router op="uploadAnonymeFile"}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert('Fichier anonyme téléversé avec succès');
                // Recharge ou afficher fichier
            },
            error: function () {
                alert('Erreur lors du téléversement');
            }
        });
    });
</script>

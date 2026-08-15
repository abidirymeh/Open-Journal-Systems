{**
 * Étape : Téléversement Anonyme
 *}

{extends file="controllers/wizard/wizardStep.tpl"}

{block name="wizardStep"}
<div class="pkp_form">
    <form id="anonymeUploadForm" class="pkp_form" method="post" enctype="multipart/form-data" action="{url router=$smarty.const.ROUTE_COMPONENT component="grid.files.submission.SubmissionFilesGridHandler" op="uploadFile" submissionId=$submission->getId()}">
        {csrf}

        <div class="form-group">
            <label for="anonymeFile">{translate key="submission.anonyme.uploadLabel"}</label>
            <input type="file" name="uploadedFile" id="anonymeFile" required>
        </div>

        <input type="hidden" name="fileStage" value="{$smarty.const.SUBMISSION_FILE_SUBMISSION}">
        <input type="hidden" name="uploaderRoles[]" value="{$smarty.const.ROLE_ID_AUTHOR}">

        <div class="form-group">
            <button class="pkp_button" type="submit">{translate key="common.upload"}</button>
        </div>
    </form>
</div>
{/block}

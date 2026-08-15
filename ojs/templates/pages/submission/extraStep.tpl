{**
 * Étape personnalisée : Document Anonyme
 *}
{extends file="layouts/frontend.tpl"}

{block name="page"}
    <h2>Étape : Document Anonyme</h2>

    {if $smarty.session.uploadMessage}
        <p><strong>{$smarty.session.uploadMessage}</strong></p>
    {/if}

    <form method="post" enctype="multipart/form-data" action="{url page='submission' op='saveExtraStep' path=$submission->getId()}">
        <label for="anonymousFile">Sélectionner un document anonyme :</label><br>
        <input type="file" name="anonymousFile" id="anonymousFile" required><br><br>

        <button type="submit">Téléverser</button>
    </form>
{/block}

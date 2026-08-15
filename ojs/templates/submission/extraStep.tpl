{extends file="layout.tpl"}

{block name=body}
    <div class="container">
        <h2>{translate key="submission.extraStep.name"}</h2>
        <p>{translate key="submission.extraStep.description"}</p>
        <p>hello</p>
        <form method="get" action="{url router=$smarty.const.ROUTE_PAGE page="submission" op="wizard" path=$submission->getId()|cat:"/confirm"}">
            <button type="submit" class="btn btn-primary">{translate key="common.continue"}</button>
        </form>
    </div>
{/block}
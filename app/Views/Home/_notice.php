

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title noticesTitle">公告通知</h6>
        <div class="heading-elements panel-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom tabNotices">
                <li class="active"><a href="#listArticle" data-toggle="tab" style="padding: 10px;"> 公告通知</a></li>
                <li><a href="#listFiles" data-toggle="tab" style="padding: 10px;"> 附件下载</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body" style="max-height: 320px;overflow: auto;min-height: 220px;">
        <div class="panel-tab-content tab-content">
            <div class="tab-pane active" id="listArticle">
                <div class="list-group list-group-borderless no-padding-top">
                    <?=view('/Home/_notice_item',['data' => \App\Libraries\LibForm::get_articles('notices',5)])?>
                </div>
            </div>
            <div class="tab-pane" id="listFiles">
                <div class="list-group list-group-borderless no-padding-top">
                    <?=view('/Home/_notice_item',['data' => \App\Libraries\LibForm::get_articles('files',5)])?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="report-widget widget-support">
    <h3><?= e(trans($this->property('title'))) ?></h3>

    <?php if (!isset($error)): ?>
        <div class="support-container">
            <div class="support-logo">
                <?= file_get_contents(plugins_path('/xitara/supportwidget/assets/images/Logo.svg')); ?>
            </div>
            <div class="support-message">
                <?php if ($lastSeen): ?>
                    <p>
                        <?= e(trans('backend::lang.dashboard.welcome.welcome_back_name', [
                            'app'=>$appName,
                            'name'=>$user->first_name
                        ])) ?>
                        <?= e(trans('backend::lang.dashboard.welcome.last_sign_in')) ?>
                    </p>
                    <p>
                        <strong><?= Backend::dateTime($lastSeen->created_at, [
                            'formatAlias' => 'dateTimeLongMin'
                        ]) ?></strong>
                    </p>
                    <?php if (BackendAuth::getUser()->hasAccess('system.access_logs')): ?>
                        <p>
                            <a href="<?= Backend::url('backend/accesslogs') ?>">
                                <?= e(trans('backend::lang.dashboard.welcome.view_access_logs')); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>
                        <?= e(trans('backend::lang.dashboard.support.support_to_name', [
                            'app'=>$appName,
                            'name'=>$user->first_name
                        ])); ?>
                    </p>
                    <p>
                        <?= e(trans('backend::lang.dashboard.support.first_sign_in')) ?>
                    </p>
                    <p>
                        <?= e(trans('backend::lang.dashboard.support.nice_message')) ?>
                    </p>
                <?php endif ?>
                <hr>
                <p class="support-text">
                    <?= e(trans('xitara.supportwidget::lang.widget.support_text')) ?>:
                </p>
                <p>
                    <?= e(trans('xitara.supportwidget::lang.widget.phone')) ?>:
                    <?= $filter->filterPhoneLink('+49 (0) 861 2090577') ?>
                </p>
                <p>
                    <?= e(trans('xitara.supportwidget::lang.widget.email')) ?>:
                    <?= $filter->filterEmailLink('support@xitara.com') ?>
                </p>
            </div>
        </div>
    <?php else: ?>
        <div class="callout callout-warning">
            <div class="content"><?= e($error) ?></div>
        </div>
    <?php endif ?>
</div>

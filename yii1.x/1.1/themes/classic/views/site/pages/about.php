<?php
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
?>
<h1>About</h1>

<h2>Features</h2>
<ol>
    <li><tt>.htaccess</tt>
    <ul>
        <li>Redirects non-www to www domain. Rule is generic so you don't need to customize it.</li>
        <li>Supports Pretty URLs</li>
        <li>Supports <tt>YII_ENVIRONMENT</tt> set. Ideally this should be the place where you should change <tt>YII_ENVIRONMENT</tt> but you can always override it in <tt>index.php</tt></li>
    </ul>
</li>


<li>Support for Multiple Environment is enabled, (Thanks to <?= CHtml::link('this', 'http://www.yiiframework.com/wiki/73') . ' and ' . CHtml::link('this', 'http://www.yiiframework.com/wiki/73/#c34'); ?>).
    <ul>
        <li>Config is broken on per environment basis inside protected/config with main.php containing generic settings, later overridden by environment specific config file.</li>
        <li><tt>main</tt>
        <ul>
            <li>Added <tt>yiilite</tt> path which can be enabled depending on requirements. Some people think this is environment specific, my observation differs.</li>
            <li><tt>enableCsrfValdation</tt> and <tt>enableCookieValidation</tt> set for <tt>request</tt> component</li>
            <li><tt>allowAutoLogin</tt> and <tt>loginUrl</tt> set for <tt>user</tt> component</li>
            <li><tt>Path</tt> format urls enabled</li>
            <li>For application you have the choice to use a single db e.g. "db" or multiple such as Auth, Session etc.</li>
            <li><tt>AuthManager</tt> is enabled and under default config uses "db" as <tt>connectionID</tt>.</li>
            <li><tt>Cache</tt> is enabled using <tt>CDummyCache</tt> as default, but can uncomment <tt>CMemcache</tt></li>
            <li><tt>logsEmail</tt> and <tt>staticContentDomain</tt> params are defined. Details inside config file.</li>
        </ul>
</li>
<li><tt>mode_development</tt>
<ul>
    <li><tt>Debug</tt> enabled with <tt>traceLevel</tt> as 3</li>
    <li><tt>Gii</tt> is enabled with password <tt>password</tt>.</li>
    <li>Db configurations have overridden parameters along with <tt>Profiling</tt> and <tt>ParamLogging</tt> enabled.</li>
    <li><tt>Logging</tt>
    <ul>
        <li><tt>FileLogging</tt> enabled for <tt>error, warning, trace</tt> and <tt>info.</tt></li>
        <li><tt>WebLogging</tt> enabled for same levels as above.</li>
    </ul>
    </li>
</ul>
</li>

<li><tt>mode_production</tt>
<ul>
    <li><tt>Debug</tt> disabled with <tt>traceLevel</tt> as 0</li>
    <li>Db configuration have overridden parameters and contains <tt>logDB</tt> definition</li>
    <li><tt>PHP-IDS</tt>(<?= Chtml::link('link', 'http://www.yiiframework.com/extension/phpids/'); ?>) is enabled</li>
    <li><tt>Logging</tt>
    <ul>
        <li><tt>FileLogging</tt> same as development mode</li>
        <li><tt>EmailLog</tt> for <tt>error</tt> and <tt>warning</tt> levels</li>
        <li>Optional <tt>database logging</tt> to <tt>logDB</tt> for <tt>error</tt> and <tt>warning</tt> levels is configured but commented</li>
    </ul>
    </li>
</ul>
</li>

<li><tt>mode_stage</tt>
<ul>
    <li><tt>Debug</tt> enabled with <tt>traceLevel</tt> as 0</li>
    <li>Db configurations overridden</li>
    <li><tt>FileLogging</tt> enabled for </tt>error, warning, trace</tt> and <tt>info</tt> Levels</li>
</ul>
</li>


<li><tt>mode_test</tt>
<ul>
    <li><tt>Debug</tt> disabled with <tt>traceLevel</tt> as 0</li>
    <li>Db configurations overridden</li>
    <li><tt>Logging</tt> same as mode_development</li>
    <li>Configured <tt>fixture</tt></li>
</ul>
</li>
</ul>
</li>


<li>Meta Tags
    <ul>
        <li>Added support for meta tags and link tags (Thanks to <?= Chtml::link('this', 'http://www.yiiframework.com/wiki/54/'); ?>)</li>
        <li>Class files located at <tt>protected/components</tt>, called <tt>ExtendedController</tt> and <tt>ParentController</tt></li>
<li>Extend your controllers from <tt>ParentController</tt></li>
<li><tt>SiteController</tt> contains examples on how to set meta, controller level, action level and combined</li>
<li>Custom component class also contains some documentation that could be useful</li>


</ul>
</li>


<li>Added default deny rule in ParentController (Thanks to <?= Chtml::link('this', 'http://www.yiiframework.com/wiki/169/configuring-controller-access-rules-to-default-deny/'); ?>)</li>
<li>Created a theme out of default view files</li>
</ol>

<h2>How to use?</h2>
<ul>
<li>To benefit from all the features described above, extend your controllers from ParentController instead of Controller or CController</li>
</ul>

<h2>Permissions</h2>
<ul>
<li>Following directories should be writable by webserver
    <ul>
        <li><tt>assets</tt></li>
<li><tt>protected/runtime</tt></li>
<li><tt>protected/components/ids/IDS/tmp</tt></li>
</ul>
</li>
</ul>
<h2>Bundled software</h2>
<ul>
    <li><?= CHtml::link('yii-1.1.7.r3135', 'http://www.yiiframework.com/download/'); ?></li>
    <li><?= CHtml::link('php-ids 0.2', 'http://www.yiiframework.com/extension/phpids/'); ?></li>                    
</ul>

<h2>Future Improvements</h2>
<ul>
    <li>Add a user component(Current consideration is <?= Chtml::link('YiiUser', 'http://code.google.com/p/yii-user'); ?>), waiting for developer to add support for creating roles, setting up permissions and assigning roles for admin users, might contribute it.</li>
    <li>Add <?= Chtml::link('PHPConsole' 'http://www.yiiframework.com/extension/php-console');?> extension</li>
    <li>Add S3 CDN Extension(Current consideration is <?= Chtml::link('es3', 'http://www.yiiframework.com/extension/es3/'); ?>)</li>
    <li>Add <?= Chtml::link('Email', 'http://www.yiiframework.com/extension/email/');?> extension</li>
    <li>Add a decent Paypal extension</li>
    <li>Add a decent openid extension</li>
    <li>Copy current theme as theme_name-minified, minify css and js and use that. Add minifer script in project. (Any suggestion which one to use?)</li>        
</ul>

<h2>Feature Requests/Contact/Feedback</h2>
<ul>
    <li>You can contact me <?= Chtml::mailto('here', 'shoaib[AT|NOSPAM]linuxmail[DOT]org');?> </li>
</ul>


<hr />
<p>This is a "static" page. You may change the content of this page
    by updating the file <tt><?php echo __FILE__; ?></tt>.</p>
